<div id="logged">
	<?php
		include './statics_interface.php';
		
		$logged = $_SESSION["logged"];
		$data = GetPlayerDatas($logged);
		if($data[1] != 0)
			$winrate = round($data[1] / $data[0] * 100);
		else
			$winrate = 0;
		$lose = $data[0] - $data[1];
		$gold = $data[3] . "G"
		
	?>
	
	<div class="loggeddiv">
		<h2> <?php echo $logged; ?> </h2>
	</div>
	
	<div style="border: 2px solid black;">
		<p class="oli"> GY: <?php echo $data[1]; ?> | V: <?php echo $lose; ?> </p>
		<p class="oli"> <?php echo $winrate; ?>% </p>
	</div>
	
	<div class="loggeddiv">
		<p class="oli" style="color:gold; font-weight: bold;">
			<?php echo $gold;?>
		</p>
	</div>
	
	<?php echo""; ?>
	
	<a href="login.php"><div class="menu-item" style="margin: 0% 10%; width:80%;"><p class="menu-item-p">Kilépés</p></div></a>
</div>		