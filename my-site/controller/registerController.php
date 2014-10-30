<?php

if(!isset($_SESSION)) {
	session_start();
	if(!isset($_SESSION['path'])) {
		header("/index.html");
		die();
	}
}

require_once $_SESSION['path'].'/model/Employee.php';
require_once $_SESSION['path'].'/model/Company.php';

class registerController {
	public function __construct() {
	
	}

	public function processRegistrationAction() {

		$message = array('type' => 0, 'content' => '');
		$employeetModel = new Employee();

		$datetime = date('Y-m-d H:i:s');
		$data = array(
			'name' => $_POST['name'],
			'age' => $_POST['age'],
			'company' => $_POST['company'],
			'lastname' => $_POST['lastname'],
			'insert_date' => $datetime,
		);

		$save = $employeetModel->save($data);
		
		if($save) {
			$message['type'] = 1;
			$message['content'] = $data['name'].' you are successfully registered';

		}
		else {
			$message['content'] = "employee save problem";
		}
			
		if($message['type'] == 0)
			echo $message['content'];
		else
			echo $message['type'];
	}

	public function getCompanyListAction() {
		$companyModel = new Company();
		$companyList = $companyModel->getCompanies();
		echo json_encode($companyList);
	}
}