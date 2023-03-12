<?php

class DB_Functions{
    function __construct(){
        require_once 'db_connect.php';
        $db = new DB_Connect();
        $this->conn = $db->connect();
    }

    function  __destruct(){
        // TODO: Implement __destruct() method.
    }

    function getSliders(){
        $result = $this->conn->query("SELECT * FROM slider");

        $sliders = array();
        while($item = $result->fetch_assoc())
            $sliders[] = $item;
        if(!empty($sliders != 0)){
            return $sliders; 
        }else{
            return NULL;
        }

    }

    function getScholars(){
        $result = $this->conn->query("SELECT * FROM scholars");

        $scholars = array();
        while($item = $result->fetch_assoc())
            $scholars[] = $item;
        if(!empty($scholars != 0)){
            return $scholars; 
        }else{
            return NULL;
        }

    }

    function getRecentUpcomingEvents(){
        $date = date("Y-m-d");
        $result = $this->conn->query("SELECT * FROM events WHERE Event_Date >= '$date' ORDER BY Event_Date ASC LIMIT 3");

        $events = array();
        while($item = $result->fetch_assoc())
            $events[] = $item;
        if(!empty($events != 0)){
            return $events; 
        }else{
            return NULL;
        }
    }

    function getBlogs(){
        $result = $this->conn->query("SELECT Blog_ID, Blog_Title, Blog_Image_S, Blog_Image_B, Blog_Content, Date, Time, Author, Blog_Cat_Name FROM blogs, blog_cats WHERE blogs.Blog_Cat_ID = blog_cats.Blog_Cat_ID");

        $blogs = array();
        while($item = $result->fetch_assoc())
            $blogs[] = $item;
        if(!empty($blogs != 0)){
            return $blogs; 
        }else{
            return NULL;
        }

    }

    function getBlogsByCategory($id){
        $result = $this->conn->query("SELECT Blog_ID, Blog_Title, Blog_Image_S, Blog_Image_B, Blog_Content, Date, Time, Author, Blog_Cat_Name FROM blogs, blog_cats WHERE blogs.Blog_Cat_ID = blog_cats.Blog_Cat_ID AND blogs.Blog_Cat_ID = '$id'");

        $blogs = array();
        while($item = $result->fetch_assoc())
            $blogs[] = $item;
        if(!empty($blogs != 0)){
            return $blogs; 
        }else{
            return NULL;
        }

    }

    function getRecentBlogs(){
        $result = $this->conn->query("SELECT Blog_ID, Blog_Title, Blog_Image_S, Blog_Image_B, Blog_Content, Date, Time, Author, Blog_Cat_Name FROM blogs, blog_cats WHERE blogs.Blog_Cat_ID = blog_cats.Blog_Cat_ID ORDER BY DATE DESC LIMIT 4");

        $blogs = array();
        while($item = $result->fetch_assoc())
            $blogs[] = $item;
        if(!empty($blogs != 0)){
            return $blogs; 
        }else{
            return NULL;
        }

    }

    function getBlog($id){
        $result = $this->conn->query("SELECT Blog_ID, Blog_Title, Blog_Image_S, Blog_Image_B, Blog_Content, Paragraph_2, Paragraph_3, Special_Quote, Date, Time, Author, Blog_Cat_Name FROM blogs, blog_cats WHERE blogs.Blog_Cat_ID = blog_cats.Blog_Cat_ID AND blogs.Blog_ID = '". $id . "'");

        $blog = array();
        while($item = $result->fetch_assoc())
            $blog[] = $item;
        if(!empty($blog != 0)){
            return $blog; 
        }else{
            return NULL;
        }

    }

    function getBlogCategories(){
        $result = $this->conn->query("SELECT * FROM blog_cats");

        $scholars = array();
        while($item = $result->fetch_assoc())
            $scholars[] = $item;
        if(!empty($scholars != 0)){
            return $scholars; 
        }else{
            return NULL;
        }

    }

    function registerUser($name, $email, $password, $address, $phone){
        $q = $this->conn->query("SELECT * FROM users WHERE `Email` = '$email'");
        if ($q->num_rows > 0) {
            return ['status'=> 303, 'message'=> 'Email already exists'];
        }else{
            $date = date("Y-m-d");
            $password = password_hash($password, PASSWORD_BCRYPT, ["COST"=> 8]);
            $result = $this->conn->query("INSERT INTO users (`Name`, `Email`, `Address`, `Phone`, `Password`, `Reg_Date`) VALUES ('$name', '$email', '$address', '$phone', '$password', '$date')");

            if ($result) {
                return ['status'=> 200, 'message'=> 'Account Created Successfully'];
            }
        }
        

    }

    function getUpcomingEvents(){
        $date = date("Y-m-d");
        $result = $this->conn->query("SELECT * FROM events WHERE Event_Date >= '$date' ORDER BY Event_Date ASC");

        $events = array();
        while($item = $result->fetch_assoc())
            $events[] = $item;
        if(!empty($events != 0)){
            return $events; 
        }else{
            return NULL;
        }
    }

    function getPastEvents(){
        $date = date("Y-m-d");
        $result = $this->conn->query("SELECT * FROM events WHERE Event_Date < '$date' ORDER BY Event_Date");

        $events = array();
        while($item = $result->fetch_assoc())
            $events[] = $item;
        if(!empty($events != 0)){
            return $events; 
        }else{
            return NULL;
        }
    }
}