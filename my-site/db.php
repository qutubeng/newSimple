<?php

$db_name = "simple";
$table1 = "employee";
$table2 = "company";

// change the them if it is required
$host_name = "localhost";
$user_name = "root";
$passwrd = "";

$con=mysqli_connect($host_name,$user_name,$passwrd);
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql="CREATE DATABASE ".$db_name;
if (mysqli_query($con,$sql)) {
	echo "Database ". $db_name ." created successfully";
} else {
	echo "Error creating database: " . mysqli_error($con);
}


if(!mysqli_select_db($con, $db_name)) die(mysql_error());

$result = "CREATE TABLE IF NOT EXISTS ". $table1 ." (
  	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`name` varchar(50) DEFAULT NULL,
  	`lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  	`age` int(2) DEFAULT NULL,
  	`insert_date` datetime DEFAULT NULL,
  	`update_date` datetime DEFAULT NULL,
  	`company` int(10) DEFAULT NULL,
  	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

if (mysqli_query($con, $result)) {
	echo "TABLE created.";
}
else {
	echo "Error in CREATE TABLE.";
}

$result = "CREATE TABLE IF NOT EXISTS ". $table2 ." (
  				`id` int(10) NOT NULL AUTO_INCREMENT,
  				`company_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  				PRIMARY KEY (`id`),
  				UNIQUE KEY `name` (`company_name`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

if (mysqli_query($con, $result)) {
	echo "TABLE created.";
}
else {
	echo "Error in CREATE TABLE.";
}

$result = "INSERT INTO ". $table2 ."(`id`, `company_name`) VALUES
				(1, 'Apple'),
				(5, 'Google'),
				(4, 'Microsoft'),
				(2, 'Samsung'),
				(3, 'Sony')";

if (mysqli_query($con, $result)) {
	echo "data Inserted";
}
else {
	echo "error in insertion";
}
?>