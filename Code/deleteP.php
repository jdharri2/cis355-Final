<?php
    include 'persons.php';

    $q = new Persons();
 $p = $q -> login();

    $p = $q -> displayDelete();

    echo $p;
?>

