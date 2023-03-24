<?php
//Start Session
session_start();

//Events Class
class Members{

    private $con;

    function __construct(){
        include_once("Database.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    //Get New Members DB Query
    public function getNewMembers(){
        $result = $this->con->query("SELECT * FROM users WHERE User_Type = '2' AND Confirm_Status = '0'");
        $members = array();
        while($item = $result->fetch_assoc())
            $members[] = $item;
        if(!empty($members != 0)){
            return $members; 
        }else{
            return NULL;
        }
    }

    //Get Old Members DB Query
    public function getOldMembers(){
        $result = $this->con->query("SELECT * FROM users WHERE User_Type = '2' AND Confirm_Status = '1'");
        $members = array();
        while($item = $result->fetch_assoc())
            $members[] = $item;
        if(!empty($members != 0)){
            return $members; 
        }else{
            return NULL;
        }
    }

    //Confirm Member DB Query
    public function confirmMember($id = null){
        if ($id != null) {
            $q = $this->con->query("UPDATE users SET Confirm_Status = '1'  WHERE `User_ID` = '$id'");
            if ($q) {
                return ['status'=> 200, 'message'=> 'Member confirm successfully'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
            
        }else{
            return ['status'=> 303, 'message'=>'Invalid event id'];
        }
    }

    //Delete Even DB Query
    public function deleteMember($id = null){
        if ($id != null) {
            $q = $this->con->query("DELETE FROM users WHERE `User_ID` = '$id'");
            if ($q) {
                return ['status'=> 200, 'message'=> 'Member Successfully removed'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
            
        }else{
            return ['status'=> 303, 'message'=>'Invalid event id'];
        }
    }
}

//Get New Members
if (isset($_GET['GET_NEW_MEMBERS'])) {
    $e = new Members();
    $json_data['data'] = $e->getNewMembers();
    echo json_encode($json_data);
    exit();
}

//Get old Members
if (isset($_GET['GET_OLD_MEMBERS'])) {
    $e = new Members();
    $json_data['data'] = $e->getOldMembers();
    echo json_encode($json_data);
    exit();
}

//Confirm Member
if (isset($_POST['CONFIRM_MEMBER'])) {
	$e = new Members();
    extract($_POST);
    if(!empty($_POST['mid'])){
        $mid = $_POST['mid'];
        $result = $e->confirmMember($mid);
        echo json_encode($result);
        exit();
    }else{
        echo json_encode(['status'=> 303, 'message'=> 'Invalid member id']);
        exit();
    }
}

//Delete Event
if (isset($_POST['DELETE_MEMBER'])) {
	$e = new Members();
    extract($_POST);
    if(!empty($_POST['mid'])){
        $mid = $_POST['mid'];
        $result = $e->deleteMember($mid);
        echo json_encode($result);
        exit();
    }else{
        echo json_encode(['status'=> 303, 'message'=> 'Invalid member id']);
        exit();
    }
}
?>