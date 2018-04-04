<?php

include 'database.php';

function SetupPlayer($name)
{
	$result = $GLOBALS['conn']->query("SELECT * FROM players");
		
	$str = true;
	if ($result->num_rows > 0) 
		while($row = $result->fetch_assoc()) 
			if($row["name"] == $name)
				$str = false;
				
	if($str)
		$GLOBALS['conn']->query("INSERT INTO `players` (`name`, `aviable`) VALUES ('$name', '-1')");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{	
	if($_GET['type'] == "")	
		die("fine");
	
	if($_GET['type'] == "reset")
	{	
		$GLOBALS['conn']->query("UPDATE players SET aviable = '-1';");
		die("fine");
	}

	$player = $_GET['name'];
	
	if($_GET['type'] == "0")
	{
		//SetupPlayer
		SetupPlayer($player);
		
		//Activate
		if ($GLOBALS['conn']->query("UPDATE players SET aviable = '0' WHERE name = '$player';") === TRUE)
			echo "ok";
		else
			echo "no";
	}
	else if($_GET['type'] == "1")
	{
		//Disable
		$GLOBALS['conn']->query("UPDATE players SET aviable = '-1' WHERE name = '$player';");
		echo "ok";
	}
	else if($_GET['type'] == "2")
	{
		//If already created;
		$result = $GLOBALS['conn']->query("SELECT * FROM players");
		if ($result->num_rows > 0) 
			while($row = $result->fetch_assoc()) 
				if($row['name'] == $player and $row['aviable'] >0)
					die($row['aviable']);
		
		//Create New game if aviable!
		//Match ID
		$result = $GLOBALS['conn']->query("SELECT * FROM matches");
		
		$max = 1;
		if ($result->num_rows > 0) 
			while($row = $result->fetch_assoc()) 
					$max++;
		
		//Get opp
		$result = $GLOBALS['conn']->query("SELECT * FROM players");
		
		$opp = "";
		if($result->num_rows > 0) 
			while($row = $result->fetch_assoc()) 
					if($row['name'] != $player and $row['aviable'] == 0)
						$opp = $row['name'];
		
		if($opp == "")
			die('v');
		
		//Get date
		$date = getdate();
		$datestr = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];		
		
		$GLOBALS['conn']->query("UPDATE players SET aviable = '$max' WHERE name = '$player' OR name = '$opp';");
		$GLOBALS['conn']->query("INSERT INTO `matches` (`id`, `wp`, `bp`, `lastmove`, `turn`, `creat`) VALUES ('$max', '$player', '$opp', 'START', '0', '$datestr');");
		
		echo $max;
	}	
	else if($_GET['type'] == "3")
	{
		$result = $GLOBALS['conn']->query("SELECT * FROM matches");
		if ($result->num_rows > 0) 
			while($row = $result->fetch_assoc()) 
				if($row['id'] == $_GET['id'])
					die($row['wp'] .';'. $row['bp'] . ';' . $row['lastmove'] . ';' . $row['turn']);
		
		die("?");
	}
	else if($_GET['type'] == "4")
	{
		$turn = $_GET['turn'];
		$move = $_GET['move'];
		$machid = $_GET['id'];
		
		$GLOBALS['conn']->query("UPDATE `matches` SET `lastmove`='$move',`turn`=$turn WHERE `id`=$machid");
		echo "ok";
	}
}	