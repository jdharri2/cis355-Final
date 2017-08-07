<?php
    include 'persons.php';

    $q = new Persons();
	$p = $q -> login();
    $p = $q -> displayCreateScreen();

    echo $p;
?>

