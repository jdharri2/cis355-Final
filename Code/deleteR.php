<?php
    include 'rounds.php';

    $q = new Rounds();
	$p = $q -> login();
    $p = $q -> displayDelete();

    echo $p;
?>

