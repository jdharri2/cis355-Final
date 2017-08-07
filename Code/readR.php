<?php
    include 'rounds.php';

    $q = new Rounds();
 $p = $q -> login();

    $p = $q -> displayRead();

    echo $p;
?>

