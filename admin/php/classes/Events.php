<?php
//Start Session
session_start();

//Events Class
class Events{

    private $con;

    function __construct(){
        include_once("Database.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    //Get All Event DB Query
    public function getEvents(){
        $result = $this->con->query("SELECT * FROM events");
        $events = array();
        while($item = $result->fetch_assoc())
            $events[] = $item;
        if(!empty($events != 0)){
            return $events; 
        }else{
            return NULL;
        }
    }

    //Add Event DB QUery
    public function createNewEvent($title, $content, $location, $date, $file){
        $fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);
        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
            if (($file['size']) > (2097152)) {
                return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB '];
            }else{
                $uniqueImageName = time()."_".$file['name'];
                if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/events/".$uniqueImageName)) {
					$q = $this->con->query("INSERT INTO `events`(`Event_Title`, `Event_Content`, `Event_Location`, `Event_Date`, `Event_Image`) VALUES ('$title', '$content', '$location', '$date', '$uniqueImageName')");
					if ($q) {
						return ['status'=> 200, 'message'=> 'Event Created Successfully..!'];
					}else{
						return ['status'=> 303, 'message'=> 'Failed to run query'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Failed to upload image'];
				}
                
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
        }
    }

    //Edit Event with Image DB Query
    public function editEventWithImage($id, $title, $content, $location, $date, $file){
        $fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);
        if($id != null){
            if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
                if (($file['size']) > (2097152)) {
                    return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB '];
                }else{
                    $uniqueImageName = time()."_".$file['name'];
                    if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/events/".$uniqueImageName)) {
                        $q = $this->con->query("UPDATE `events` SET 
                        `Event_Title` = '$title', 
                        `Event_Content` = '$content',
                        `Event_Location` = '$location',
                        `Event_Date` = '$date',
                        `Event_Image` = '$uniqueImageName'
                        WHERE `Event_ID` = '$id'");
                        
                        if ($q) {
                            return ['status'=> 200, 'message'=> 'Event Updated Successfully..!'];
                        }else{
                            return ['status'=> 303, 'message'=> 'Failed to run query'];
                        }
    
                    }else{
                        return ['status'=> 303, 'message'=> 'Failed to upload image'];
                    }
                    
                }
            }else{
                return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Event ID'];
        }
        
    }


    //Edit Event without Image DB Query
    public function editEventWithoutImage($id, $title, $content, $location, $date){
        if($id != null){
            $q = $this->con->query("UPDATE `events` SET 
                        `Event_Title` = '$title', 
                        `Event_Content` = '$content',
                        `Event_Location` = '$location',
                        `Event_Date` = '$date'
                        WHERE `Event_ID` = '$id'");
                        
            if ($q) {
                return ['status'=> 200, 'message'=> 'Event Updated Successfully..!'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Event ID'];
        }
    }

    //Delete Even DB Query
    public function deleteEvent($id = null){
        if ($id != null) {
			$q = $this->con->query("DELETE FROM events WHERE `Event_ID` = '$id'");
			if ($q) {
				return ['status'=> 200, 'message'=> 'Event Successfully removed'];
			}else{
				return ['status'=> 303, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Invalid event id'];
		}
    }
}

//Get All Events
if (isset($_GET['GET_EVENTS'])) {
    $e = new Events();
    $json_data['data'] = $e->getEvents();
    echo json_encode($json_data);
    exit();
}

//Add Event
if (isset($_POST['add_event'])){
    $e = new Events();
    extract($_POST);
    if(empty($title)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Event Title']);
        exit();
    }else if (empty($content)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Event Content']);
        exit();
    }else if (empty($location)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Event Location']);
        exit();
    }else if (empty($date)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Event Date']);
        exit();
    }else if (empty($_FILES['event_image']['name'])){
        echo json_encode(['status'=> 303, 'message'=> 'Add Event Image']);
        exit();
    }else{
        $result = $e->createNewEvent($title, $content, $location, $date, $_FILES['event_image']);
        echo json_encode($result);
        exit();
    }
}

//Edit Event
if (isset($_POST['edit_event'])){
    $e = new Events();
    extract($_POST);
    if(empty($title)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Event Title']);
        exit();
    }else if (empty($content)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Event Content']);
        exit();
    }else if (empty($location)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Event Location']);
        exit();
    }else if (empty($date)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Event Date']);
        exit();
    }else{
        if(isset($_FILES['event_image']['name']) && !empty($_FILES['event_image']['name'])){
            $result = $e->editEventWithImage($id, $title, $content, $location, $date, $_FILES['event_image']);
        }else{
            $result = $e->editEventWithoutImage($id, $title, $content, $location, $date);
        }
        echo json_encode($result);
        exit();
    }

}

//Delete Event
if (isset($_POST['DELETE_EVENT'])) {
	$e = new Events();
    extract($_POST);
    if(!empty($_POST['eid'])){
        $eid = $_POST['eid'];
        $result = $e->deleteEvent($eid);
        echo json_encode($result);
        exit();
    }else{
        echo json_encode(['status'=> 303, 'message'=> 'Invalid event id']);
        exit();
    }
}

?>