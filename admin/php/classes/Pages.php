<?php

class Pages {
    private $con;

    function __construct(){
        include_once("Database.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function getHomePageBanners(){
        $result = $this->con->query("SELECT * FROM slider");
        $banner = array();
        while($item = $result->fetch_assoc())
            $banner[] = $item;
        if(!empty($banner != 0)){
            return $banner; 
        }else{
            return NULL;
        }
    }

    public function createHomeBanners($file) {
        $fileName = $file['name'];
        $fileNameAr = explode(".", $fileName);
        $extension = end($fileNameAr);
        $ext = strtolower($extension);
    
        // Check for valid image formats
        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
            // Check file size (2MB limit)
            if (($file['size']) > (2097152)) {
                return ['status' => 303, 'message' => 'Large Image, Max Size allowed 2MB'];
            } else {
                $uniqueImageName = time() . "_" . $file['name'];
                
                // Build the file path using $_SERVER['DOCUMENT_ROOT']
                $uploadPath = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/resources/" . $uniqueImageName;
    
    
                // Move the uploaded file to the correct location
                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    $query = "INSERT INTO `slider`(`Image`) VALUES (?)";
                    $stmt = $this->con->prepare($query);
                    $stmt->bind_param("s", $uniqueImageName);
    
                    if ($stmt->execute()) {
                        return ['status' => 200, 'message' => 'Banner Created Successfully..!'];
                    } else {
                        return ['status' => 303, 'message' => 'Failed to run query'];
                    }
                } else {
                    return ['status' => 303, 'message' => 'Failed to upload image'];
                }
            }
        } else {
            return ['status' => 303, 'message' => 'Invalid Image Format [Valid Formats: jpg, jpeg, png]'];
        }
    }
    
    //Delete Even DB Query
    public function deleteBanner($id = null){
        if ($id != null) {
            $q = $this->con->query("DELETE FROM slider WHERE `ID` = '$id'");
            if ($q) {
                return ['status'=> 200, 'message'=> 'Banner Successfully removed'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
        }else{
            return ['status'=> 303, 'message'=>'Invalid banner id'];
        }	
	
    }

    public function editBanner($id, $status, $showMessage){
        $query = "UPDATE `slider` SET `Status` = ?, `ShowMessage` = ? WHERE `ID` = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("iii", $status, $showMessage, $id);
        if ($stmt->execute()) {
            return ['status' => 200, 'message' => 'Banner Updated Successfully..!'];
        } else {
            return ['status' => 303, 'message' => 'Failed to run query'];
        }
    }

}

if (isset($_GET['GET_BANNERS'])) {
    $p = new Pages();
    $json_data['data'] = $p->getHomePageBanners();
    echo json_encode($json_data);
    exit();
}


//Add Event
if (isset($_POST['add_homebanner'])){
    $p = new Pages();
    extract($_POST);
    if (empty($_FILES['banner_image']['name'])){
        echo json_encode(['status'=> 303, 'message'=> 'Add Banner Image']);
        exit();
    }else{
        $result = $p->createHomeBanners($_FILES['banner_image']);
        echo json_encode($result);
        exit();
    }
}

//Delete Event
if (isset($_POST['DELETE_BANNER'])) {
	$p = new Pages();
    extract($_POST);
    if(!empty($_POST['eid'])){
        $eid = $_POST['eid'];
        $result = $p->deleteBanner($eid);
        echo json_encode($result);
        exit();
    }else{
        echo json_encode(['status'=> 303, 'message'=> 'Invalid banner id']);
        exit();
    }
}

//Edit Banner
if (isset($_POST['edit_banner'])){
    $p = new Pages();
    extract($_POST);

    // Set default values if checkboxes are not present in POST
    $status = isset($_POST['status']) ? $_POST['status'] : 0;
    $showMessage = isset($_POST['showMessage']) ? $_POST['showMessage'] : 0;

    $result = $p->editBanner($id, $status, $showMessage);

    echo json_encode($result);
}
?>