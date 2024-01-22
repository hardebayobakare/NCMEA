<?php
//Start Session
session_start();

//Scholars Class
class Scholars{

    private $con;

    function __construct(){
        include_once("Database.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    //Get All Event DB Query
    public function getScholars(){
        $result = $this->con->query("SELECT * FROM scholars");
        $scholars = array();
        while($item = $result->fetch_assoc())
            $scholars[] = $item;
        if(!empty($scholars != 0)){
            return $scholars; 
        }else{
            return NULL;
        }
    }

    //Add Scholar DB QUery
    public function createNewScholar($name, $description, $email, $twitter, $facebook, $youtube, $file){
        $fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);
        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
            if (($file['size']) > (2097152)) {
                return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB '];
            }else{
                $uniqueImageName = time()."_".$file['name'];
                if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/assets/img/scholars/".$uniqueImageName)) {
					$query = "INSERT INTO `scholars`(`Scholar_Name`, `Scholar_Description`, `Scholar_Email`, `Twitter`, `Facebook`, `Youtube`, `Scholar_Image`) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $this->con->prepare($query);
                    $stmt->bind_param("sssssss", $name, $description, $email, $twitter, $facebook, $youtube, $uniqueImageName);
					if ($stmt->execute()) {
						return ['status'=> 200, 'message'=> 'Scholar Created Successfully..!'];
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

    //Edit Scholars with Image DB Query
    public function editScholarWithImage($id, $name, $description, $email, $twitter, $facebook, $youtube, $file){
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
                    if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/assets/img/scholars/".$uniqueImageName)) {
                        $query = "UPDATE `scholars` SET 
                        `Scholar_Name` = ?, 
                        `Scholar_Description` = ?,
                        `Scholar_Email` = ?,
                        `Twitter` = ?,
                        `Facebook` = ?,
                        `Youtube` = ?,
                        `Scholar_Image` = ?
                        WHERE `Scholar_ID` = ?";
                        $stmt = $this->con->prepare($query);
                        $stmt->bind_param("sssssssi", $name, $description, $email, $twitter, $facebook, $youtube, $uniqueImageName, $id);                        
                        if ($stmt->execute()) {
                            return ['status'=> 200, 'message'=> 'Scholar Updated Successfully..!'];
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
    public function editScholarWithoutImage($id, $name, $description, $email, $twitter, $facebook, $youtube){
        if($id != null){
            $query = "UPDATE `scholars` SET 
                        `Scholar_Name` = ?, 
                        `Scholar_Description` = ?,
                        `Scholar_Email` = ?,
                        `Twitter` = ?,
                        `Facebook` = ?,
                        `Youtube` = ?,
                        WHERE `Scholar_ID` = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("ssssssi", $name, $description, $email, $twitter, $facebook, $youtube, $id);   
            if ($stmt->execute()) {
                return ['status'=> 200, 'message'=> 'Scholar Updated Successfully..!'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Event ID'];
        }
    }

    //Delete Scholar DB Query
    public function deleteScholar($id = null){
        if ($id != null) {
            $q = $this->con->query("DELETE FROM scholars WHERE `Scholar_ID` = '$id'");
            if ($q) {
                return ['status'=> 200, 'message'=> 'Scholar Successfully removed'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
            
        }else{
            return ['status'=> 303, 'message'=>'Invalid scholar id'];
        }
    }
}


//Get All Events
if (isset($_GET['GET_SCHOLARS'])) {
    $s = new Scholars();
    $json_data['data'] = $s->getScholars();
    echo json_encode($json_data);
    exit();
}


//Add Scholar
if (isset($_POST['add_scholar'])){
    $s = new Scholars();
    extract($_POST);
    if(empty($name)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Scholar Name']);
        exit();
    }else if (empty($description)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter short description about scholar']);
        exit();
    }else if (empty($email)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Scholar Email']);
        exit();
    }else if (empty($_FILES['scholar_image']['name'])){
        echo json_encode(['status'=> 303, 'message'=> 'Add Event Image']);
        exit();
    }else{
        $result = $s->createNewScholar($name, $description, $email, $twitter, $facebook, $youtube, $_FILES['scholar_image']);
        echo json_encode($result);
        exit();
    }
}

//Edit Scholar
if (isset($_POST['edit_scholar'])){
    $s = new Scholars();
    extract($_POST);
    if(empty($name)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Scholar Name']);
        exit();
    }else if (empty($description)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter short description about scholar']);
        exit();
    }else if (empty($email)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Scholar Email']);
        exit();
    }else{
        if(isset($_FILES['scholar_image']['name']) && !empty($_FILES['scholar_image']['name'])){
            $result = $s->editScholarWithImage($id, $name, $description, $email, $twitter, $facebook, $youtube, $_FILES['scholar_image']);
        }else{
            $result = $s->editScholarWithoutImage($id, $name, $description, $email, $twitter, $facebook, $youtube);
        }
        echo json_encode($result);
        exit();
    }

}


//Delete Event
if (isset($_POST['DELETE_SCHOLAR'])) {
	$s = new Scholars();
    extract($_POST);
    if(!empty($_POST['sid'])){
        $sid = $_POST['sid'];
        $result = $s->deleteScholar($sid);
        echo json_encode($result);
        exit();
    }else{
        echo json_encode(['status'=> 303, 'message'=> 'Invalid scholar id']);
        exit();
    }
}


?>