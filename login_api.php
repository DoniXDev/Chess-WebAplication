<?php
require 'login_interface.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{	
	$type = $_GET['type'];
	$name = $_GET['un'];
	$pass = $_GET['pa'];
	
	if($type == 1)
		if(Register($name, $pass))
			echo "1";
		else
			echo "0";
		
	if($type == 0)
		if(Login($name, $pass))
			echo "1";
		else
			echo "0";
}
?>