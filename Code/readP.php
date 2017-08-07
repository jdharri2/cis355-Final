<?php
    include 'persons.php';

    $q = new Persons();
 $p = $q -> login();

    $p = $q -> displayRead();

    echo $p;
?>

