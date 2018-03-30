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
	-->
	
	<body>
	
	<div id="menu"> 
		<a href="index.php"><div class="menu-item"><p class="menu-item-p">Kezdőlap</p></div></a>
		<a href="index.php?page=news"><div class="menu-item"><p class="menu-item-p">Újdonságok</p></div></a>
		<a href="index.php?page=top"><div class="menu-item"><p class="menu-item-p">Ranglista</p></div></a>
		<a href="index.php?page=profile"><div class="menu-item"><p class="menu-item-p">Profil</p></div></a>
		<a href="index.php?page=shop"><div class="menu-item"><p class="menu-item-p">Bolt</p></div></a>
	</div>
	
	<div id="login">
		<br>
		<form action="/action_page.php">
			<label class="login-item-center" for="fname">Felhasználónév</label>
			<input type="text" id="fname" name="firstname" placeholder="Írd be a felhasználóneved!">

			<label class="login-item-center" for="lname">Jelszó</label>
			<input type="text" id="lname" name="lastname" placeholder="Írd be a jelszavad!">
		  
			<input type="submit" value="Belépés">
		</form>
	</div>
	
	<div id="content">
		
		<div id="header">
			<div id="title">Chess</div>
		</div>
		
		
	
	</div>
	
	</body>
</html>