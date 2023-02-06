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

    function getUpcomingEvents(){
        $result = $this->conn->query("SELECT * FROM events ORDER BY Event_Date LIMIT 2");

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