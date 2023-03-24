<?php
//Start Session
session_start();

//Credential Class
class Credentials{
    
    //Database Connection Variable
    private $con;

    function __construct(){
        //Get Database Connection
        include_once("Database.php");
        $db = new Database();
        $this->con = $db->connect();
    }


    public function userLogin($email, $password){
        $q = $this->con->query("SELECT * FROM users WHERE Email = '$email' LIMIT 1");
		if ($q->num_rows > 0) {
            //User Exists
			$row = $q->fetch_assoc();
			if (password_verify($password, $row['Password'])) {
                //Successful Verification of Password
                //Creatiing a new User Session ID
				session_regenerate_id();
				$user_session_id = session_id();
                
				$_SESSION['user_session_id'] = $user_session_id;
                $user_id = $row['User_ID'];

                // Updating User Session ID in Database
                $q2 = $this->con->query("UPDATE users SET `Session_ID` = '$user_session_id' WHERE `User_ID` = '$user_id'");
                if($q2) {
                    //Successful Login Process Completed
                    //Update Session Variables
                    $_SESSION['user_name'] = $row['Name'];
                    $_SESSION['user_email'] = $row['Email'];
                    $_SESSION['user_id'] = $row['User_ID'];
                    $_SESSION['IS_LOGIN'] = 'yes';
                    $_SESSION['LAST_ACTIVE_TIME'] = time();
                    return ['status'=> 200, 'message'=> 'Login Successful'];
                } else {
                    return ['status'=> 303, 'message'=> 'Internal Server Error!'];
                }
			}else{
				return ['status'=> 303, 'message'=> 'Login Fail! Password Incorrect!!!'];
			}
		}else{
			return ['status'=> 303, 'message'=> 'Account for this email not found. Sign Up!'];
		}

    }

    function registerAdmin($name, $email, $address, $password,  $phone){
        $q = $this->con->query("SELECT * FROM users WHERE `Email` = '$email'");
        if ($q->num_rows > 0) {
            return ['status'=> 303, 'message'=> 'Email already exists'];
        }else{
            $date = date("Y-m-d");
            $password = password_hash($password, PASSWORD_BCRYPT, ["COST"=> 8]);
            $result = $this->con->query("INSERT INTO users (`Name`, `Email`, `Address`,`Password`, `Phone`, `Reg_Date`, `User_Type`) VALUES ('$name', '$email', '$address', '$password','$phone', '$date', '1')");

            if ($result) {
                return ['status'=> 200, 'message'=> 'Account Created Successfully'];
            }
        }
    }
}

// $c = new Credentials();
// $result = $c->registerAdmin("NCMEA Admin", "ncmedmonton@gmail.com", "1949 Lakewood Rd. South NW, T6K3W9, Edmonton, AB", "3OyxB88vP!Sy",  "+1 (780) 782-7295");

if (isset($_POST['user_login'])) {
	extract($_POST);
	if (!empty($email) && !empty($password)) {
		$c = new Credentials();
		$result = $c->userLogin($email, $password);
		echo json_encode($result);
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Email and Password Required!']);
		exit();
	}
}
?>