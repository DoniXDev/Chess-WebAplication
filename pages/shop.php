<h1>Bolt</h1>

 <?php
	
	if ($_SERVER["REQUEST_METHOD"] == "GET")
		if(!empty($_GET['buy']))
			if(Buy($logged, $_GET['buy'][0], $_GET['buy'][1]))
				echo "<h2>Sikeres vásárlás!</h2>";
			else
				echo "<h2>Hiba</h2>";
	

	$pdata = GetPlayerDatas($logged);
	$data = GetShopItems();
	$max = count($data);
 
	$i=0;
	while ($i<$max)
	{
		$split = explode(":", $data[$i]);	
?>

<div class="shop-item">
	
	<?php
	if($pdata[4][$split[0]] != $split[1])
	{
	?>
	
	<a href="./index.php?page=shop&buy=<?php echo $split[0];?><?php echo $split[1];?>"><div class="shop-item-buy">
		<p class="shop-item-buy-p"> Vásárlás</p>
	</div></a>
	
	<?php
	}
	else
	{
	?>
	
	<div class="shop-item-selected">
		<p class="shop-item-buy-p"> Kiválasztva</p>
	</div>
	
	<?php
	}
	?>
	
	<div class="shop-item-images"><img class="shop-item-image" src="./units/<?php echo $split[5];?>.png"></div>
	
	<div class="shop-item-images"><img class="shop-item-image" src="./units/<?php echo $split[4];?>.png"></div>
	
	<div class="shop-item-images"><b><?php echo $split[3];?> arany</b></div>
	
	<div class="shop-item-images"><b>Fehér változat</b></div>
	
	<div class="shop-item-images"><b>Fekete változat</b></div>
	
	<div class="shop-item-images" ><b><?php echo $split[2];?></b></div>
</div>
<br>

<?php 
	$i=$i+1;
	}
?>