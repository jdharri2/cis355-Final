<?php
    include 'courses.php';

    $q = new Courses();
 $p = $q -> login();

    $p = $q -> displayRead();

    echo $p;
?>

