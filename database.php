<?php
//new mysqli("mysql.hostinger.hu", "u467704677_root", "eyyo123", "u467704677_leake");
//new mysqli("localhost", "root", "", "chess");
$conn = new mysqli("mysql.hostinger.hu", "u467704677_root", "eyyo123", "u467704677_leake");
if ($conn->connect_error)
	die("Error");
?>