<?php session_start(); $logged = "";?>

<html>

	<head>
	  <title>Chess</title>
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <link rel="icon" href="icon.ico">
	  <meta HTTP-EQUIV="Content-Type" Content="text/html; Charset=iso-8859-2">
	  <meta HTTP-EQUIV="Content-Language" Content="hu">
	</head>	

	<!-- 
		Created by: Magyar (donix) Tamás

		Pages:
			- Index
			- News
			- Toplist
			- Profile: (default your) you can find any player profile
			- Shop: you can buy skins, score reset for gold
			- Mégsem így szeretném.
			
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
			include "forms/form_login.php";
		else
			include "forms/form_logged.php";

		?>
		
		<div id="content">
			
			<div id="header">
				<div id="title">Chess</div>
				<div id="author">version: 1.0 <br> Készítette: Magyar Tamás <br> (Epam Nyári Gyakorlat Pályamunka 2018)
			</div>
			
		</div>
		
		<div id="sub-content">
			
			<?php
				include_once "statics_interface.php";
				
				$page = "home";
				if(!empty($_GET['page']))
					$page = $_GET['page'];
				
				if($page == "news")
					include 'pages/news.php';
				
				if($page == "top")
					include 'pages/toplist.php';
				
				$search = "";
				if(!empty($_GET['name']))
					$search = $_GET['name'];
				
				if($page == "profile")
					if($search == "" )
						if($logged == "")
							include 'pages/profile_empty.php';
						else
						{
							$search = $logged;
							
							if(!is_null(GetPlayerDatas($search)))
								include 'pages/profile.php';
							else
								include 'pages/profile_notfound.php';
						}
					else
					{
						if(!is_null(GetPlayerDatas($search)))
							include 'pages/profile.php';
						else
							include 'pages/profile_notfound.php';	
					}
					
				if($page == "shop")
					if($logged != "")
						include 'pages/shop.php';
					else
						include 'pages/shop_error.php';
				
				if($page == "home")
					include 'pages/home.php';
			?>
			
		</div>
	
	</body>

</html>