<?php

	session_start();
	include 'login_interface.php';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$name = $_POST['name'];
		$pass = $_POST['password'];
		
		$pass = GetMD5($pass);		
	
		if(Login($name, $pass))
			$_SESSION["logged"] = $name;
		else
			header("Location: index.php?e=0");
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$_SESSION["logged"] = "";
	}
	
	
	header("Location: index.php");
	exit;
?>