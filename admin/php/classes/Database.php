<?php

/**
 * System Database
 */

class Database{
	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "root", "", "ncmea");
		return $this->con;
	}

}

?>