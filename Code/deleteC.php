<?php
    include 'courses.php';

    $q = new Courses();
 $p = $q -> login();

    $p = $q -> displayDelete();

    echo $p;
?>

