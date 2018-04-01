<?php
include 'database.php';
	
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
				if(trim($row["pass"]) == trim($pass))
					return true;
				
	return false;
}

function GetMD5($pStr) {
    $hash = md5($pStr);
	return strtoupper($hash);
}