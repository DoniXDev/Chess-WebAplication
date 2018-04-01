<?php

include 'database.php';

function GetPlayerDatas($name)
{
	$result = $GLOBALS['conn']->query("SELECT * FROM players");
	
	$datas = array("games", "wins", "mmr", "gold");
	
	if ($result->num_rows > 0) 
		while($row = $result->fetch_assoc()) 
			if($row["name"] == $name)
			{
				$datas[0] = $row["games"];
				$datas[1] = $row["wins"];
				$datas[2] = $row["mmr"];
				$datas[3] = $row["gold"];
			}
	
	if($datas[0] == "games")
		return null;
	else
		return $datas;
}

function GetHightScores()
{
	$result = $GLOBALS['conn']->query("SELECT * FROM players ORDER BY mmr DESC");
	
	$datas = array("empty:0", "empty:0", "empty:0", "empty:0", "empty:0", "empty:0" , "empty:0" , "empty:0" , "empty:0" , "empty:0");
	$count = 0;
	
	if ($result->num_rows > 0) 
	while($row = $result->fetch_assoc()) 
		if($count < 10)
		{
			$datas[$count] = $row["name"] . ":" . $row["mmr"];
			$count++;
		}
	
	return $datas;
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

	$rate = 5;
	
	$mmrval = $rate/$cal;
	if($mmrval<1 && $lMMR>0)
		$mmrval=1;
	
	$wMMR += round($mmrval);
	$lMMR -= round($mmrval);
	//
	
	//Win 50gold | Lose 10gold
	$GLOBALS['conn']->query("UPDATE players SET gold = gold + '50', games = games + '1', wins = wins + '1', mmr = '$wMMR' WHERE name = '$winner';");
	$GLOBALS['conn']->query("UPDATE players SET gold = gold + '10', games = games + '1', mmr = '$lMMR' WHERE name = '$loser';");
	
	return $mmrval;
}

?>