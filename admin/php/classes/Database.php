<?php

/**
 * System Database
 */

class Database{
	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "thencmeo_admin", "K+j4q2r^@P]6", "thencmeo_main");
		return $this->con;
	}

}

?>