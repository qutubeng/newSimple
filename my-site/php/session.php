<?php

if(!isset($_SESSION)) {
	session_start();
	if(!isset($_SESSION['path'])) {
		$path = str_replace("\\", "/", getcwd());
		$path = str_replace("php", "", $path);
		$_SESSION['path'] = $path;
	}
}