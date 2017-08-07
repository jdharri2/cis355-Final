<?php

 session_start();
        if(!isset($_SESSION['username']))
        {
            header( "Location: login.php" );
        }

?>
<!DOCTYPE html>
<html>

<head>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script>
$(document).ready( function() {
  $.get("persons.json", function(json) {
    $.each(json['persons'], function(i, per) {
      $("#personsTable").append(
		'<tr>' +
			'<td>' + per.fname + '</td>' +
			'<td>' + per.lname + '</td>' +
			'<td>' + per.age + '</td>' +
		'<tr>'
      );
    });
  });
});
  </script>
<link   href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/css.css" rel="stylesheet">
</head>
<body>
   <table id="personsTable">
            <tr>
                <th> FName </th>
                <th> LName </th>
                <th> Age </th>
            </tr>
    </table>
<a class="btn btn-danger" href="home.php">Back</a>
</body>
</html>

