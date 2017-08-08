<?php

 include "database.php";
        if(isset($_GET['id'])) {
                echo json_encode(
                        Database::prepare(
                        'SELECT * FROM `tt_persons` WHERE id=' . $_GET['id'],
                        array()
                        )->fetchAll(PDO::FETCH_ASSOC)
                );
        } else
                echo json_encode(
                        Database::prepare(
                        'SELECT * FROM `tt_persons`',
                        array()
                        )->fetchAll(PDO::FETCH_ASSOC)
                );



?>  
<html>
 <link   href="css/bootstrap.min.css" rel="stylesheet">
<br><br>
<a class="btn btn-danger" href="home.php">Home</a>
</html>
