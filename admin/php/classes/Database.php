<?php

/**
 * System Database
 */

class Database{
	private $con;
	
	public function connect(){
		require_once '../../config/config.php';
		$this->con = new Mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		return $this->con;
	}

}

?>