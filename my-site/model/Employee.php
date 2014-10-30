<?php

class Employee extends Database {
	public function __construct() {
		parent::__construct();
	}	
	public function save($data) {
		return $this->Insert($data, 'employee');
	}

	public function getAllUsers() {
		$q = "SELECT employee.id, employee.name, employee.lastname, employee.age, company.company_name FROM employee, company WHERE employee.company = company.id";
		echo json_encode($this->SelectDirectQuery($q));
		
		return $this->SelectDirectQuery($q);
	}
	
	public function getUserByID($id) {
		$q = "SELECT * FROM employee WHERE id=".$id;
		
		return $this->SelectDirectQuery($q);
	}
	
	public function updateData($data, $id) {
		return $this->Update($data, 'employee', $id);
	}
	
	public function del($id) {
		return $this->Delete($id, 'employee');
	}
}