<?php

class Company extends Database {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getCompanies() {
		$q = "SELECT * FROM company";
		return $this->SelectDirectQuery($q);
	}
}