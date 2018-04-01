<?php
require 'statics_interface.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{	
	//Get player datas [ID=0]
	//Upload game datas [ID=1]

	$type = $_GET['type'];
	$name = $_GET['name'];
	
	if($type == 0)
	{
		$data = GetPlayerDatas($name);
		
		if(!empty($data))
			foreach ($data as $val)
				echo $val . ":";
		else
			echo "0";
	}
	
	if($type == 1)
	{
		$loser = $_GET['los'];
		echo Win($name, $loser);
	}
}
?>