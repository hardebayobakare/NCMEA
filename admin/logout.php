<?php

//Start Session
session_start();


session_unset();

header('location:sign-in.php');


die();
?>