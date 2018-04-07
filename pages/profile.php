<div style="height: 10%; width: 30%; float: right; margin-top: 3%;">
	<form action="index.php" method="get">
		<input type="hidden" id="page" name="page" value="profile"">
		<input type="text" id="name" name="name" placeholder="Keresés...">
	</form>
</div>

	<?php
		$search;
		$data = GetPlayerDatas($search);
		$shop = GetShopItems();
		
		
		$HSmatch = GetHightScores("games");
		$HSwins = GetHightScores("wins");
		$HSmmr = GetHightScores("mmr");
		
		$HSMID;
		$HSWID;
		$HSMMRID;
		$c;
		
		$c = 0;
		foreach($HSmatch as $value)
		{
			$c++;
			$splitted = explode(":", $value);
			if($splitted[0] == $search)
				$HSMID = $c;
		}
		
		$c = 0;
		foreach($HSwins as $value)
		{
			$c++;
			$splitted = explode(":", $value);
			if($splitted[0] == $search)
				$HSWID = $c;
		}
		
		$c = 0;
		foreach($HSmmr as $value)
		{
			$c++;
			$splitted = explode(":", $value);
			if($splitted[0] == $search)
				$HSMMRID = $c;
		}

		
		if($data[1] != 0)
			$winrate = round($data[1] / $data[0] * 100);
		else
			$winrate = 0;
	?>


<h1 style="height: 10%;">Profil statisztika</h1>

<table class="profile-table">
	<tr style="height: 20%;">
		<td td colspan="2" style="font-size: 2vw; font-weight: bold; width: 20%;">
		<?php
			echo "$search";
		?>
		</td>
		<td style="width: 40%;">Áltag</td>
	</tr>
	
	<tr>
		<td>Lejátszott meccsek száma</td> <td style="width: 40%;"><?php $out = $data[0]; if(!empty($HSMID)) $out .= " <sup>|#" . $HSMID . "|</sup>";  echo $out; ?></td> <td><?php echo GetAverageScores("games") ?></td>
	</tr>
	
	<tr>
		<td>Nyert meccsek száma</td> <td><?php $out = $data[1]; if(!empty($HSWID)) $out .= " <sup>|#" . $HSWID . "|</sup>";  echo $out; ?></td> <td><?php echo GetAverageScores("wins") ?></td>
	</tr>
	
	<tr>
		<td>Nyerési arány</td> <td><b style='color:
									<?php  
										if($winrate < 40)
											echo "red'>". $winrate . "%"; 
										else if($winrate > 55)
											echo "green'>". $winrate . "%";
										else
											echo "orange'>". $winrate . "%";
									?>
									</b></td> <td><?php echo (GetAverageScores("wins") / GetAverageScores("games") * 100) . "%" ?></td>
	</tr>
	
	<tr>
		<td>ELO</td> <td><?php $out = $data[2]; if(!empty($HSMMRID)) $out .= " <sup>|TOP " . $HSMMRID . ".|</sup>";  echo $out; ?></td></td> <td><?php echo GetAverageScores("mmr") ?></td>
	</tr>
	
	
	
	<tr>
		<td>Sakk készlet</td>
		<td colspan="2"> 
		<div class="image-gallery">
		<?php
		$mypieces = $data[4];
		for ($i = 0; $i<6 ; $i++)
			foreach($shop as $val)
			{
				$splitted = explode(":", $val);
				if($splitted[0] == $i && $splitted[1] == $mypieces[$i])
					echo "<img src='./units/$splitted[5].png'>";
			}
		?>
		</div>
		</td>
	</tr>

</table>


<h2>Meccs előzmények (utolsó 7nap)</h2>
<h3>Jelenleg nem elérhető</h3>
<table class="profile-matchhistory">

</table>






