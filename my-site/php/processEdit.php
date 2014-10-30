<?php

if(!isset($_SESSION)) {
	session_start();
	if(!isset($_SESSION['path'])) {
		header("/index.html");
		die();
	}
}

require_once $_SESSION['path'].'/model/Database.php';
require_once $_SESSION['path'].'/controller/userController.php';

if(isset($_POST['id'])) {
	$_SESSION['id'] = $_POST['id'];
}

$userController = new userController();
$user = $userController->editDataAction($_SESSION['id']);
echo json_encode($user);