<?php
// from: https://www.youtube.com/watch?v=lGYixKGiY7Y

session_start();
//connect to database
//$db=mysqli_connect("localhost","root","","authentication");
require "database.php";
$db = Database::connectMysqli();

$usernameError = null;
$passwordError = null;
$password2Error = null;

$username =  $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];


$valid = true;
  if (empty($username)) {
            $usernameError = 'Please enter Username';
            $valid = false;
        }
if(empty($password)){
	$passwordError = 'Please enter a password';
	$valid = false;
}
if(empty($password2)){
	$password2Error = 'Please re-enter your password';
	$valid = false;
}

if(isset($_POST['register_btn']) && $valid)
{
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);  
     if($password==$password2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO users(username,password) VALUES('$username','$password')";
            mysqli_query($db,$sql);  
            $_SESSION['message']="You are now logged in"; 
            $_SESSION['username']=$username;
            header("location:home.php");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two password do not match";   
     }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register , login and logout user php mysql</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
 <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css.css" rel="stylesheet">

</head>
<body>
<div class="container"
<div class="header">
    <h1>Register, login and logout user php mysql</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<div class="register">
<form method="post" action="register.php">
           <h3>Username : </h3>
           <p><input type="text" name="username" class="textInput" value="<?php echo !empty($username)?$username:'';?>"</p>
			 			<?php if (!empty($usernameError)): ?>

			<span class="help-inline"><?php echo $usernameError;?></span>
            <?php endif;?>

           <h3>Password : </h3>
           <p><input type="password" name="password" class="textInput" value="<?php echo !empty($password)?$password:'';?>"</p>
			 			<?php if (!empty($passwordError)): ?>

			<span class="help-inline"><?php echo $passwordError;?></span>
            <?php endif;?>

           <h3>Password again: </h3>
           <p><input type="password" name="password2" class="textInput" value="<?php echo !empty($password2)?$password2:'';?>"</p>
 			<?php if (!empty($password2Error)): ?>

			<span class="help-inline"><?php echo $password2Error;?></span>
            <?php endif;?>

           <p><input class="btn btn-success" type="submit" name="register_btn" class="Register"></p>
</form>
</div>
</div>
</body>
</html>

