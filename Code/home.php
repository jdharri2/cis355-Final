<?php
session_start();

if(!isset($_SESSION['username'])){
	header("Location: login.php");
}


//this file is only used to show who is logged in and allow user to logout
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tee Time</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
<div class="row">
    <h1> <a href="indexP.php">Players</a> <a href="indexC.php">Courses</a> <a href="indexR.php">Rounds</a></h1>
</div>
<div class="row">
	<h2> Welcome <?php echo $_SESSION['username'];?></h2>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<div class="row">
<h1>Home</h1>
<div class="footer">
<a class="btn btn-danger" href="logout.php">Log Out</a>
<a class="btn btn-success" href="fileUpload.php">Upload File </a>
<a class="btn btn-success" href="jsonExample.php">JSON FILE </a>
</div>
</div>
</div>
</body>
</html>

