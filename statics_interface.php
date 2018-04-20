<?php

include 'database.php';
$GameVersion = "1.2";


function GetPlayerDatas($name)
{
	$result = $GLOBALS['conn']->query("SELECT * FROM players");
	
	$datas = array("games", "wins", "mmr", "gold", "inventory");
	
	if ($result->num_rows > 0) 
		while($row = $result->fetch_assoc()) 
			if($row["name"] == $name)
			{
				$datas[0] = $row["games"];
				$datas[1] = $row["wins"];
				$datas[2] = $row["mmr"];
				$datas[3] = $row["gold"];
				$datas[4] = $row["inventory"];
			}
	
	if($datas[0] == "games")
		return null;
	else
		return $datas;
}

function GetAverageScores($type)
{
	$result = $GLOBALS['conn']->query("SELECT name, $type FROM players ORDER BY $type DESC");
	
	$str = 0;
	$count = 0;
	
	if ($result->num_rows > 0) 
	while($row = $result->fetch_assoc()) 
	{
			$str += $row[$type];
			$count++;
	}
	
	return round($str / $count);
}

function GetHightScores($type)
{
	$result = $GLOBALS['conn']->query("SELECT * FROM players ORDER BY $type DESC");
	
	$datas = array("empty:0", "empty:0", "empty:0", "empty:0", "empty:0", "empty:0" , "empty:0" , "empty:0" , "empty:0" , "empty:0");
	$count = 0;
	
	if ($result->num_rows > 0) 
	while($row = $result->fetch_assoc()) 
		if($count < 10)
		{
			$datas[$count] = $row["name"] . ":" . $row[$type];
			$count++;
		}
	
	return $datas;
}

function GetShopItems()
{
	$data = array();
	$result = $GLOBALS['conn']->query("SELECT * FROM shop");
	
	if ($result->num_rows > 0) 
		while($row = $result->fetch_assoc()) 
			array_push($data, $row["type"] . ":" . $row["varian"] . ":" . $row["name"] . ":" . $row["cost"] . ":" . $row["w_src"] . ":" . $row["b_src"]);
	else
		return null;
	
	return $data;
}

function Buy($name, $type, $variant)
{
	$result = $GLOBALS['conn']->query("SELECT * FROM shop");
	$data = GetPlayerDatas($name);
	$inventory = $data[4];
	
	$cost = -1;
	
	if ($result->num_rows > 0) 
	while($row = $result->fetch_assoc())
	if($row['type'] == $type)
		if($row['varian'] == $variant)
			if($row['cost'] <= $data[3])
				if($row['varian'] != $data[4][$row['type']])
				$cost = $row['cost'];
			else
				return false;
	
	if($cost == -1)
		return false;

	$inventory[$type] = $variant;
	
	$GLOBALS['conn']->query("UPDATE players SET gold = gold - '$cost', inventory = '$inventory' WHERE name = '$name';");
	return true;
}

function Win($winner, $loser)
{
	$wDatas = GetPlayerDatas($winner);
	$lDatas = GetPlayerDatas($loser);
	
	
	//MMR system (donix form chess)
	$wMMR = $wDatas[2];
	$lMMR = $lDatas[2];
	
	$fal = $wMMR/$lMMR;
	$cal = 1;
	
	if($fal > 1)
		$cal = $fal;
	else
		$cal = 1 + $fal;

	$rate = 30;
	
	$mmrval = $rate/$cal;
	if($mmrval<1 && $lMMR>0)
		$mmrval=1;
	
	$wMMR += round($mmrval);
	$lMMR -= round($mmrval);
	//
	
	//Win 50gold | Lose 10gold
	$GLOBALS['conn']->query("UPDATE players SET gold = gold + '50', games = games + '1', wins = wins + '1', mmr = '$wMMR' WHERE name = '$winner';");
	$GLOBALS['conn']->query("UPDATE players SET gold = gold + '10', games = games + '1', mmr = '$lMMR' WHERE name = '$loser';");
	
	return round($mmrval);
}

?>