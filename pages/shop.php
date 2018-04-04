<h1>Bolt</h1>

 <?php

	$i=1;
	while ($i<=10)
	{
?>

<div class="shop-item">
	<a href="./index.php?page=shop&buy="><div class="shop-item-buy">
		<p class="shop-item-buy-p">Vásárlás</p>
	</a></div>

	<div class="shop-item-images">
		<img class="shop-item-image" src="./units/BlackB.png">
	</div>
	
	<div class="shop-item-images">
		<img class="shop-item-image" src="./units/WhiteB.png">
	</div>
	
	<div class="shop-item-images">
		<b>50 arany</b>
	</div>
	
	<div class="shop-item-images">
		<b>Fehér változat</b>
	</div>
	
	<div class="shop-item-images">
		<b>Fekete változat</b>
	</div>
	
	<div class="shop-item-images" >
		<b>Ára</b>
	</div>
</div>
<br>

<?php 

	$i=$i+1;
	}

?>