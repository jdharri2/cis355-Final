<?php
    include 'rounds.php';

    $q = new Rounds();
 $p = $q -> login();

    $p = $q -> displayUpdate();

    echo $p;
?>

