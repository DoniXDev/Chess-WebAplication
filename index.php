<?php session_start(); $logged = "";?>

<html>
	<head>
	  <title>Chess</title>
	  <link rel="stylesheet" type="text/css" href="chess/style.css">
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <meta HTTP-EQUIV="Content-Type" Content="text/html; Charset=iso-8859-2">
	  <meta HTTP-EQUIV="Content-Language" Content="hu">
	</head>

	<!-- 
		Created by: Magyar (donix) Tamás
	-->
	
	<!-- 
	Pages:
		- Index
		- News
		- Toplist
		- Profile: (default your) you can find any player profile
			- Error(Unable to find a palyer)
		- Shop: you can buy skins, score reset for gold
			- Error (You are not logged in / you dont have enough gold to unlock / its already unlocked )
		
	Scripts:	
		- Login (2form login/logged), login script
		- Buy
		- Statics
		- game-manager (off)
		
	-->
	
	<body>
	
	<div id="menu"> 
		<a href="index.php"><div class="menu-item"><p class="menu-item-p">Kezdőlap</p></div></a>
		<a href="index.php?page=news"><div class="menu-item"><p class="menu-item-p">Újdonságok</p></div></a>
		<a href="index.php?page=top"><div class="menu-item"><p class="menu-item-p">Ranglista</p></div></a>
		<a href="index.php?page=profile"><div class="menu-item"><p class="menu-item-p">Profil</p></div></a>
		<a href="index.php?page=shop"><div class="menu-item"><p class="menu-item-p">Bolt</p></div></a>
	</div>
	
	<?php
	
	if(!empty($_SESSION["logged"]))
		$logged = $_SESSION["logged"];

	if($logged == "")
		include "form_login.php";
	else
		include "form_logged.php";

	?>
	
	<div id="content">
		
		<div id="header">
			<div id="title">Chess</div>
			<div id="author">By: Magyar Tamás (Epam Nyári Gyakorlat Pályamunka)
		</div>
		
	</div>
	
	<div id="sub-content">
		
		<?php include 'home.php'?>
		
	</div>
	
	
	</body>
</html>