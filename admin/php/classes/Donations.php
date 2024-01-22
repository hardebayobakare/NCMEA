<?php
//Start Session
session_start();


class Donations{
    private $con;

    function __construct(){
        include_once("Database.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    //Get All Event DB Query
    public function getDonations(){
        $result = $this->con->query("SELECT * FROM donations");
        $donations = array();
        while($item = $result->fetch_assoc())
            $donations[] = $item;
        if(!empty($donations != 0)){
            return $donations; 
        }else{
            return NULL;
        }
    }

    public function editDonationWithImage($id, $title, $content, $f_required, $f_received, $file){
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
                    if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/donations/".$uniqueImageName)) {
                        $query = "UPDATE `donations` SET 
                        `Donation_Title` = ?, 
                        `Donation_Content` = ?,
                        `Funds_Needed` = ?,
                        `Funds_Received` = ?,
                        `Donation_Image` = ?
                        WHERE `Donation_ID` = ?";
                        $stmt = $this->con->prepare($query);
                        $stmt->bind_param("sssssi", $title, $content, $f_required, $f_received, $uniqueImageName, $id);                        
                        if ($stmt->execute()) {
                            return ['status'=> 200, 'message'=> 'Donation Updated Successfully..!'];
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
            return ['status'=> 303, 'message'=> 'Invalid Donation ID'];
        }
        
    }

    public function editDonationWithoutMedia($id, $title, $content, $f_required, $f_received){
        if($id != null){
            $query = "UPDATE `donations` SET 
                        `Donation_Title` = ?, 
                        `Donation_Content` = ?,
                        `Funds_Needed` = ?,
                        `Funds_Received` = ?
                        WHERE `Donation_ID` = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("sssssi", $title, $content, $f_required, $f_received, $id);                        
            if ($stmt->execute()) {
                return ['status'=> 200, 'message'=> 'Donation Updated Successfully..!'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Donation ID'];
        }
    }

    //Delete Donation DB Query
    public function deleteDonation($id = null){
        if ($id != null) {
            $q = $this->con->query("DELETE FROM donations WHERE `Donation_ID` = '$id'");
            if ($q) {
                return ['status'=> 200, 'message'=> 'Event Successfully removed'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
        }else{
            return ['status'=> 303, 'message'=>'Invalid event id'];
        }
    }

    //Add Donation DB QUery
    public function createNewDonation($title, $content, $f_required, $f_received, $file){
        $fileName = $file['name'];
        $fileNameAr= explode(".", $fileName);
        $extension = end($fileNameAr);
        $ext = strtolower($extension);
        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
            if (($file['size']) > (2097152)) {
                return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB '];
            }else{
                $uniqueImageName = time()."_".$file['name'];
                if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/donations/".$uniqueImageName)) {
                    $query = "INSERT INTO `donations`(`Donation_Title`, `Donation_Content`, `Funds_Needed`, `Funds_Received`, `Donation_Image`) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $this->con->prepare($query);
                    $stmt->bind_param("sssss", $title, $content, $f_required, $f_received, $uniqueImageName);
                    if ($stmt->execute()) {
                        return ['status'=> 200, 'message'=> 'Donation Created Successfully..!'];
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
}


//Get All Donations
if (isset($_GET['GET_DONATIONS'])) {
    $e = new Donations();
    $json_data['data'] = $e->getDonations();
    echo json_encode($json_data);
    exit();
}

//Edit Event
if (isset($_POST['edit_donation'])){
    $e = new Donations();
    extract($_POST);
    if(empty($title)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Donation Title']);
        exit();
    }else if (empty($content)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Donation Content']);
        exit();
    }else if (empty($f_required)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Donation Funds Required']);
        exit();
    }else if (empty($f_received)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Donation Funds Received']);
        exit();
    }else{
        if(isset($_FILES['donation_image']['name']) && !empty($_FILES['donation_image']['name'])){
            $result = $e->editDonationWithImage($id, $title, $content, $f_required, $f_received, $_FILES['donation_image']);
        }else{
            $result = $e->editDonationWithoutMedia($id, $title, $content, $f_required, $f_received);
        }
        echo json_encode($result);
        exit();
    }

}

//Delete Event
if (isset($_POST['DELETE_DONATION'])) {
	$e = new Donations();
    extract($_POST);
    if(!empty($_POST['eid'])){
        $eid = $_POST['eid'];
        $result = $e->deleteDonation($eid);
        echo json_encode($result);
        exit();
    }else{
        echo json_encode(['status'=> 303, 'message'=> 'Invalid donation id']);
        exit();
    }
}

//Add Donation
if (isset($_POST['add_donation'])){
    $e = new Donations();
    extract($_POST);
    if(empty($title)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Donation Title']);
        exit();
    }else if (empty($content)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Donation Content']);
        exit();
    }else if (empty($f_required)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Donation Funds Required']);
        exit();
    }else if (empty($f_received)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Donation Funds Received']);
        exit();
    }else if (empty($_FILES['donation_image']['name'])){
        echo json_encode(['status'=> 303, 'message'=> 'Add Donation Image']);
        exit();
    }else{
        $result = $e->createNewDonation($title, $content, $f_required, $f_received, $_FILES['donation_image']);
        echo json_encode($result);
        exit();
    }
}
?>