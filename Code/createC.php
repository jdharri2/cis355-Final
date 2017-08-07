<?php
    include 'courses.php';

    $q = new Courses();
 $p = $q -> login();

    $p = $q -> displayCreateScreen();

    echo $p;
?>

