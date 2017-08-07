<?php
	include 'rounds.php';

	$q = new Rounds();
 $p = $q -> login();

	$p = $q -> displayListScreen();

	echo $p;
?>
