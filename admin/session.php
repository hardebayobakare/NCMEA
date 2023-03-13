<?php 
	session_start();
    
    if(!isset($_SESSION['user_id'])){ // If session does not exist user is redirected to login. 
        header('location:sign-in.php');
    }
?>

