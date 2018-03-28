<?php
//new mysqli("mysql.hostinger.hu", "u467704677_root", "eyyo123", "u467704677_leake");
//new mysqli("localhost", "root", "", "chess");
$conn = new mysqli("mysql.hostinger.hu", "u467704677_root", "eyyo123", "u467704677_leake");
if ($conn->connect_error) {
    die("Error");
}
	
function Register($name, $pass)
{
	$result = $GLOBALS['conn']->query("SELECT * FROM players");
		
	$str = true;
	if ($result->num_rows > 0) 
		while($row = $result->fetch_assoc()) 
			if($row["name"] == $name)
				return false;

	$GLOBALS['conn']->query("INSERT INTO `players` (`name`, `aviable`, `pass`) VALUES ('$name', '-1', '$pass')");
	return true;
}

function Login($name, $pass)
{
	
	$result = $GLOBALS['conn']->query("SELECT * FROM players");
		
	if ($result->num_rows > 0) 
		while($row = $result->fetch_assoc()) 
			if($row["name"] == $name)
				if($row["pass"] == $pass)
					return true;
				
	return false;
}