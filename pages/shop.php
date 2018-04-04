<h1>Bolt</h1>

 <?php


 
 
 
	$data = GetShopItems();
	$max = count($data);
 
	$i=0;
	while ($i<$max)
	{
		$split = explode(":", $data[$i]);	
?>

<div class="shop-item">

	<a href="./index.php?page=shop&buy=<?php echo $split[0];?>:<?php echo $split[1];?>"><div class="shop-item-buy">
		<p class="shop-item-buy-p">
		<?php
			echo "Vásárlás";
		
		?>
		</p>
	</div></a>
	
	<div class="shop-item-images">
		<img class="shop-item-image" src="./units/<?php echo $split[5];?>.png">
	</div>
	
	<div class="shop-item-images">
		<img class="shop-item-image" src="./units/<?php echo $split[4];?>.png">
	</div>
	
	<div class="shop-item-images">
		<b><?php echo $split[3];?> arany</b>
	</div>
	
	<div class="shop-item-images">
		<b>Fehér változat</b>
	</div>
	
	<div class="shop-item-images">
		<b>Fekete változat</b>
	</div>
	
	<div class="shop-item-images" >
		<b><?php echo $split[2];?></b>
	</div>
</div>
<br>

<?php 

	$i=$i+1;
	}

?>