<html>
<head>
<link   href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/css.css" rel="stylesheet">
</head>
	<body>
<div class="list-right">
	<a href="home.php" class="btn btn-danger">Home</a>
</div>
		<form method="post" enctype="multipart/form-data">
				<h3>Select a File</h3>
				<p>
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
				<input name="userfile" type="file" id="userfile">
				</p>
				<input name="upload" type="submit" class="btn btn-success" id="upload"  value=" Upload ">
		</form>
	</body>
</html>

<?php
 session_start();
        if(!isset($_SESSION['username']))
        {
            header( "Location: login.php" );
        }

ini_set('file-uploads',true);
if(isset($_POST['upload']) && $_FILES['userfile']['size']>0)
{
  $fileName = $_FILES['userfile']['name'];
  $tmpName  = $_FILES['userfile']['tmp_name'];
  $fileSize = $_FILES['userfile']['size'];
  $fileType = $_FILES['userfile']['type'];
  $fileType = (get_magic_quotes_gpc()==0 
    ? mysql_real_escape_string($_FILES['userfile']['type'])
    : mysql_real_escape_string(stripslashes ($_FILES['userfile'])));
  $fp       = fopen($tmpName, 'r');
  $content  = fread($fp, filesize($tmpName));
  $content  = addslashes($content);
  echo "filename: " . $fileName . "<br />";
  echo "filesize: " . $fileSize . "<br />";
  echo "filetype: " . $fileType . "<br />";
  fclose($fp);
   if (! get_magic_quotes_gpc() )
   {
     $fileName = addslashes($fileName);
   }
  $con = mysql_connect('localhost','jdharri2','574785') 
    or die(mysql_error());
  $db  = mysql_select_db('jdharri2',$con);
  if($db)
  {
    $query = "INSERT INTO images (filename, filesize, filetype, filecontent) ".
	  "VALUES ('$fileName', '$fileSize', '$fileType', '$content')";
	mysql_query($query) or die('Error... query failed!');
	mysql_close();
	echo "<br />File $fileName <br />uploaded successfully <br />";
  }
  else
  {
    echo "file upload failed: " . mysql_error();
  }
}
?>
