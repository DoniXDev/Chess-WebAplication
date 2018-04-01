<h1>Ranglista</h1>
<div id="ToplistDIV">
	
	<table id="ToplistTable">
		
		<tr class="border_bottom"> <td style="color: black;"> # </td> <td style="color: black;"> Név </td> <td style="color: black;"> MMR <td> </tr>
		
		<?php
		include_once './statics_interface.php';
		$do = GetHightScores();
		$logged; 

		$c = 1;
		foreach($do as $value)
			if($value <> "empty:0")
			{
				$splitted = explode(":", $value);
				if($logged == $splitted[0])
					echo "<tr> <td> <h4>$c</h4></td> <td> <h4>$splitted[0]</h4> </td> <td> <h4>$splitted[1]</h4> <td> </tr>";
				else
					echo "<tr> <td> $c </td> <td> $splitted[0] </td> <td> $splitted[1] <td> </tr>";
				
				$c++;
			}
		?>
	</table>
	
</div>