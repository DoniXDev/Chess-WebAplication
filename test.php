<?php

include 'statics_interface.php';

$data = GetShopItems();

foreach($data as $val)
	echo $val;

echo "nem,jo";

?>