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
    public function createNewEvent($title, $content, $location, $date, $time, $file){
        $fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);
        $datetime = $date ." ". $time;
        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
            if (($file['size']) > (2097152)) {
                return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB '];
            }else{
                $uniqueImageName = time()."_".$file['name'];
                if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/assets/img/events/".$uniqueImageName)) {
					$query = "INSERT INTO `events`(`Event_Title`, `Event_Content`, `Event_Location`, `Event_Date`, `Event_Image`, `Event_Time`) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $this->con->prepare($query);
                    $stmt->bind_param("ssssss", $title, $content, $location, $date, $uniqueImageName, $datetime);
					if ($stmt->execute()) {
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
    public function editEventWithImage($id, $title, $content, $location, $date, $time, $file){
        $fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);
        $datetime = $date ." ". $time;
        if($id != null){
            if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
                if (($file['size']) > (2097152)) {
                    return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB '];
                }else{
                    $uniqueImageName = time()."_".$file['name'];
                    if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/assets/img/events/".$uniqueImageName)) {
                        $query = "UPDATE `events` SET 
                        `Event_Title` = ?, 
                        `Event_Content` = ?,
                        `Event_Location` = ?,
                        `Event_Date` = ?,
                        `Event_Image` = ?,
                        `Event_Time` = ?
                        WHERE `Event_ID` = ?";
                        $stmt = $this->con->prepare($query);
                        $stmt->bind_param("ssssssi", $title, $content, $location, $date, $uniqueImageName, $datetime, $id);                       
                        if ($stmt->execute()) {
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

    public function editEventWithVideo($id, $title, $content, $location, $date, $time, $file){
        $fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);
        $datetime = $date ." ". $time;
        if($id != null){
            if ($ext == "mp4" || $ext == "avi" || $ext == "mov" || $ext == "wmv") {
                if (($file['size']) > (10485760)) {
                    return ['status'=> 303, 'message'=> 'Large Video ,Max Size allowed 10MB '];
                }else{
                    $uniqueVideoName = time()."_".$file['name'];
                    if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/assets/video/events/".$uniqueVideoName)) {
                        $query = "UPDATE `events` SET 
                        `Event_Title` = ?, 
                        `Event_Content` = ?,
                        `Event_Location` = ?,
                        `Event_Date` = ?,
                        `Event_Video` = ?,
                        `Event_Time` = ?
                        WHERE `Event_ID` = ?";
                        $stmt = $this->con->prepare($query);
                        $stmt->bind_param("ssssssi", $title, $content, $location, $date, $uniqueVideoName, $datatime, $id);                       
                        if ($stmt->execute()) {
                            return ['status'=> 200, 'message'=> 'Event Updated Successfully..!'];
                        }else{
                            return ['status'=> 303, 'message'=> 'Failed to run query'];
                        }
    
                    }else{
                        return ['status'=> 303, 'message'=> 'Failed to upload image'];
                    }
                    
                }
            }else{
                return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : mp4, avi, mov, wmv]'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Event ID'];
        }
        
    }

    public function editEventWithImageAndVideo($id, $title, $content, $location, $date, $time, $file1, $file2){
        $fileName_Image = $file1['name'];
        $fileName_Video = $file2['name'];
		$fileNameAr_Image= explode(".", $fileName_Image);
        $fileNameAr_Video= explode(".", $fileName_Video);
		$extension_Image = end($fileNameAr_Image);
        $extension_Video = end($fileNameAr_Video);
		$ext_Image = strtolower($extension_Image);
        $ext_Video = strtolower($extension_Video);
        $datetime = $date ." ". $time;
        if($id != null){
            if ($ext_Image == "jpg" || $ext_Image == "jpeg" || $ext_Image == "png") {
                if($ext_Video == "mp4" || $ext_Video == "avi" || $ext_Video == "mov" || $ext_Video == "wmv"){
                    if (($file1['size']) > (2097152)) {
                        return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB '];
                    }else if(($file2['size']) > (10485760)){
                        return ['status'=> 303, 'message'=> 'Large Video ,Max Size allowed 2MB '];
                    }else{
                        $uniqueImageName = time()."_".$file1['name'];
                        $uniqueVideoName = time()."_".$file2['name'];
                        if (move_uploaded_file($file1['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/assets/img/events/".$uniqueImageName)) {
                            if(move_uploaded_file($file2['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/assets/video/events/".$uniqueVideoName)){
                                $query = "UPDATE `events` SET 
                                `Event_Title` = ?, 
                                `Event_Content` = ?,
                                `Event_Location` = ?,
                                `Event_Date` = ?,
                                `Event_Time` = ?,
                                `Event_Image` = ?,
                                `Event_Video` = ?
                                WHERE `Event_ID` = ?";
                                $stmt = $this->con->prepare($query);
                                $stmt->bind_param("sssssssi", $title, $content, $location, $date, $datatime, $uniqueImageName, $uniqueVideoName, $id);                       
                                if ($stmt->execute()) {
                                    return ['status'=> 200, 'message'=> 'Event Updated Successfully..!'];
                                }else{
                                    return ['status'=> 303, 'message'=> 'Failed to run query'];
                                }
                            }else{
                                return ['status'=> 303, 'message'=> 'Failed to upload video'];
                            }
                        }else{
                            return ['status'=> 303, 'message'=> 'Failed to upload image'];
                        }    
                    }
                }else{
                    return ['status'=> 303, 'message'=> 'Invalid Video Format [Valid Formats : mp4, avi, mov, wmv]'];
                }
            }else{
                return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Event ID'];
        }
        
    }


    //Edit Event without Image DB Query
    public function editEventWithoutMedia($id, $title, $content, $location, $date, $time){
        $datetime = $date ." ". $time;
        if($id != null){
            $query = "UPDATE `events` SET 
            `Event_Title` = ?, 
            `Event_Content` = ?,
            `Event_Location` = ?,
            `Event_Date` = ?,
            `Event_Time` = ?
            WHERE `Event_ID` = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("sssssi", $title, $content, $location, $date, $datetime, $id);
            if ($stmt->execute()) {
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
            $q1 = $this->con->query("DELETE FROM volunteers WHERE `Event_ID` = '$id'");
            if($q1){
                $q = $this->con->query("DELETE FROM events WHERE `Event_ID` = '$id'");
                if ($q) {
                    return ['status'=> 200, 'message'=> 'Event Successfully removed'];
                }else{
                    return ['status'=> 303, 'message'=> 'Failed to run query'];
                }
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }	
		}else{
			return ['status'=> 303, 'message'=>'Invalid event id'];
		}
    }

    public function updateVolunteer($id, $volunteer){
        if($id != null){
            $q = $this->con->query("UPDATE `events` SET 
                        `Volunteer` = '$volunteer'
                        WHERE `Event_ID` = '$id'");
                        
            if ($q) {
                return ['status'=> 200, 'message'=> 'Event Volunteer Updated Successfully..!'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Event ID'];
        }
    }

    //Get All Event DB Query
    public function getVolunteer($eid){
        $result = $this->con->query("SELECT * FROM events WHERE `Event_ID` = '$eid'");
        $events = array();
        while($item = $result->fetch_assoc())
            $events[] = $item;
        if(!empty($events != 0)){
            return $events; 
        }else{
            return NULL;
        }
    }

    //Get All Event DB Query
    public function getVolunteers($id){
        $result = $this->con->query("SELECT * FROM volunteers WHERE `Event_ID` = '$id'");
        $events = array();
        while($item = $result->fetch_assoc())
            $events[] = $item;
        if(!empty($events != 0)){
            return $events; 
        }else{
            return NULL;
        }
    }

    //Get All Event DB Query
    public function stopVolunteer($id){
        if($id != null){
            $q = $this->con->query("UPDATE events SET Volunteer = '0' WHERE `Event_ID` = '$id'");
            if ($q) {
                return ['status'=> 200, 'message'=> 'Event Volunteer Updated Successfully..!'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Event ID'];
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
    }else if (empty($time)){
            echo json_encode(['status'=> 303, 'message'=> 'Enter Event Time']);
            exit();
    }else if (empty($_FILES['event_image']['name'])){
        echo json_encode(['status'=> 303, 'message'=> 'Add Event Image']);
        exit();
    }else{
        $result = $e->createNewEvent($title, $content, $location, $date, $time, $_FILES['event_image']);
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
        if(isset($_FILES['event_image']['name']) && !empty($_FILES['event_image']['name']) && isset($_FILES['event_video']['name']) && !empty($_FILES['event_video']['name'])){
            $result = $e->editEventWithImageAndVideo($id, $title, $content, $location, $date, $time, $_FILES['event_image'], $_FILES['event_video']);
        }
        else if(isset($_FILES['event_image']['name']) && !empty($_FILES['event_image']['name'])){
            $result = $e->editEventWithImage($id, $title, $content, $location, $date, $time, $_FILES['event_image']);
        }else if(isset($_FILES['event_video']['name']) && !empty($_FILES['event_video']['name'])){
            $result = $e->editEventWithVideo($id, $title, $content, $location, $date, $time, $_FILES['event_video']);
        }else{
            $result = $e->editEventWithoutMedia($id, $title, $content, $location, $date, $time);
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

//Add Event
if (isset($_POST['add_volunteer'])){
    $e = new Events();
    extract($_POST);
    if(empty($volunteer)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Number of Volunteers Needed']);//
        exit();
    }else{
        $result = $e->updateVolunteer($id, $volunteer);
        echo json_encode($result);
        exit();
    }
}

//Get Volunteer
if (isset($_POST['GET_VOLUNTEER'])) {
	$e = new Events();
    extract($_POST);
    if(!empty($_POST['eid'])){
        $eid = $_POST['eid'];
        $result = $e->getVolunteer($eid);
        echo json_encode($result);
        exit();
    }else{
        echo json_encode(['status'=> 303, 'message'=> 'Invalid event id']);
        exit();
    }
}
//Get Volunteer
if (isset($_GET['GET_VOLUNTEERS'])) {
	$e = new Events();
    $json_data['data'] = $e->getVolunteers($_GET['id']);
    echo json_encode($json_data);
    exit();
}

//Stop Volunteer
if (isset($_POST['STOP_VOLUNTEER'])) {
	$e = new Events();
    extract($_POST);
    if(!empty($_POST['eid'])){
        $eid = $_POST['eid'];
        $result = $e->stopVolunteer($eid);
        echo json_encode($result);
        exit();
    }else{
        echo json_encode(['status'=> 303, 'message'=> 'Invalid event id']);
        exit();
    }
}

?>