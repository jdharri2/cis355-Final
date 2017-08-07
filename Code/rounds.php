<?php
	include 'database.php'; //	include 'crud.php';
	class Rounds{ //implements Table {
		private $person_id;
		private $course_id;
		private $date;
		private $time;
		private $strokes01;
		private $strokes02;
		private $strokes03;
		private $strokes04;
		private $strokes05;
		private $strokes06;
		private $strokes07;
		private $strokes08;
		private $strokes09;
		private $strokes10;
		private $strokes11;
		private $strokes12;
		private $strokes13;
		private $strokes14;
		private $strokes15;
		private $strokes16;
		private $strokes17;
		private $strokes18;

		//constructor
		function __construct($id,$fname,$lname,$email,$mobile){
			$this->id = $id;
			$this->name = $name;
			$this->email = $email;
			$this->mobile = $mobile;
		}

 		public function login(){
        session_start();
        if(!isset($_SESSION['username']))
        {
            header( "Location: login.php" );
        }

    }

		public function displayListScreen(){ ?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
    		<meta charset="utf-8">
			<link href="css/css.css" rel="stylesheet">
    		<link href="css/bootstrap.min.css" rel="stylesheet">
    		<script src="js/bootstrap.min.js"></script>
		</head>
		<body> <h1> <a href="indexP.php">Players</a> <a href="indexC.php">Courses</a> <a href="indexR.php">Rounds</a></h1>
    		<div class="container">
            	<div class="row">
                	<h3>Rounds Table</h3>
            	</div>
            	<div class="row">
					<p> <a href="createR.php" class="btn btn-success">Create</a><a id="home" class="btn btn-danger" href="home.php">Home </a> </p>
                	<table class="table table-striped table-bordered">
                  		<thead>
                    		<tr>
							<th> Course ID </th>
							<th> Course Name </th>
							<th> Tee Date </th>
							<th> Tee Time </th>
							 <th>Hole 1 </th>
							 <th>Hole 2 </th>
							 <th>Hole 3 </th>
							 <th>Hole 4 </th>
							 <th>Hole 5 </th>
							 <th>Hole 6 </th>
							 <th>Hole 7 </th>
							 <th>Hole 8 </th>
							 <th>Hole 9 </th>
							 <th>Hole 10 </th>
							 <th>Hole 11 </th>
							 <th>Hole 12 </th>
							 <th>Hole 13 </th>
							 <th>Hole 14 </th>
							 <th>Hole 15 </th>
							 <th>Hole 16 </th>
							 <th>Hole 17 </th>
							 <th>Hole 18 </th>
							 <th> Action </th>
                    		</tr>
                  		</thead>
                 <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM tt_rounds ORDER BY id DESC';

                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['course_id']. '</td>';
					$num = $row['course_id'];
					$sql1 = "SELECT * FROM tt_courses WHERE id = $num";

					foreach($pdo->query($sql1) as $row1){
						echo '<td>'. $row1['name']. '</td>';
					}


                            echo '<td>'. $row['date'] . '</td>';
                            echo '<td>'. $row['time'] . '</td>';
                            echo '<td>'. $row['strokes01'] . '</td>';
 							echo '<td>'. $row['strokes02'] . '</td>';
							echo '<td>'. $row['strokes03'] . '</td>';
							echo '<td>'. $row['strokes04'] . '</td>';
							echo '<td>'. $row['strokes05'] . '</td>';
							echo '<td>'. $row['strokes06'] . '</td>';
							echo '<td>'. $row['strokes07'] . '</td>';
							echo '<td>'. $row['strokes08'] . '</td>';
							echo '<td>'. $row['strokes09'] . '</td>';
							echo '<td>'. $row['strokes10'] . '</td>';
							echo '<td>'. $row['strokes11'] . '</td>';
							echo '<td>'. $row['strokes12'] . '</td>';
							echo '<td>'. $row['strokes13'] . '</td>';
							echo '<td>'. $row['strokes14'] . '</td>';
							echo '<td>'. $row['strokes15'] . '</td>';
							echo '<td>'. $row['strokes16'] . '</td>';
							echo '<td>'. $row['strokes17'] . '</td>';
							echo '<td>'. $row['strokes18'] . '</td>';
                            echo '<td> <a class="btn btn-info" href="readR.php?id='.$row['id'].'">Read</a>
                            <a class="btn btn-success" href="updateR.php?id='.$row['id'].'">Update</a>
                            <a class="btn btn-danger" href="deleteR.php?id='.$row['id'].'">Delete</a></td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            	</table>
				<p>Currently Logged In As <?php echo $_SESSION['username'];?> Want To <a href="logout.php"> Logout</a>?</p>
        	</div>
    	</div> <!-- /container -->
  	</body>
	</html> <?php
	}
	public function displayCreateScreen(){
//user will not be able to input strokes because they haven't played yet this will be done in the update section
	if(!empty($_POST)){
		$personError = null;
		$courseError = null;
		$flagC = true;
		$flagP = true;

		$time = $_POST['time'];
		$date = $_POST['date'];
		$personid = $_POST['personid'];
		$courseid = $_POST['courseid'];

$valid = true;
	$pdo2 = Database::connect();
	$sql2 = "SELECT * FROM tt_persons WHERE id = $personid";
	$p = 0;

	foreach($pdo2->query($sql2) as $row2){
		$p = $row2['id'];
	}
	if($p == 0){
		$personError = 'Please enter a valid id number';
		$valid = false;
	}
	Database::disconnect();

    $pdo2 = Database::connect();
    $sql2 = "SELECT * FROM tt_courses WHERE id = $courseid";
    $c = 0;

    foreach($pdo2->query($sql2) as $row2){
        $c = $row2['id'];
    }
    if($c == 0){
        $courseError = 'Please enter a valid id number';
        $valid = false;
    }
    Database::disconnect();




		if($valid){
			$pdo = Database::connect();
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         	$sql = "INSERT INTO tt_rounds(person_id,course_id,date,time) values(?,?,?,?)"; 
        	$q = $pdo->prepare($sql);
         	$q->execute(array($personid,$courseid,$date,$time));
         	Database::disconnect();
         	header("Location: indexR.php");
		}
	}
?>
<html lang="en"> 
<head>
    <meta charset="utf-8">
	<link href="css/css.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script> 
</head> 
<div class="container">
<div class="list-right">
<h2> Persons </h2>
<ul>
<?php
	$pdo = Database::connect();
	$sql = "SELECT * FROM tt_persons";
	foreach ($pdo->query($sql) as $row) {
	?><li><?php echo $row['id'] ?> = <?php echo $row['name']?></li><?php } Database:: disconnect();?>
</ul>
<br><br>
<h2> Courses </h2>
<ul>
<?php 
	$pdo = Database::connect();
	$sql = "SELECT * FROM tt_courses";
	foreach ($pdo->query($sql) as $row) {
	?><li><?php echo $row['id']?> = <?php echo $row['name']?></li><?php } Database:: disconnect();?>
</ul>
</div>
<body>
<hr>
	<h1> Create Round </h1>
<form class="form-horizontal" action="createR.php" method="post"> 


								  <div class="control-group <?php echo !empty($courseError)?'error':'';?>">
									<label class="control-label">Course ID</label>
									<div class="controls">
										<input name="courseid" type="text"  placeholder="Course ID" value="<?php echo !empty($courseid)?$courseid:'';?>">
										<?php if(!empty($courseError)):?>
											<span class="help-line"><?php echo $courseError;?></span>
										<?php endif; ?>
									</div>
								  </div>

<div class="control-group <?php echo !empty($personError)?'error':'';?>">
	<label class="control-label">Person ID </label>
		<div class="controls">
			<input name="personid" type="text" placeholder="Person ID" value="<?php echo !empty($personid)?$personid:'';?>">
			<?php if(!empty($personError)): ?>
				<span class="help-line"><?php echo $personError;?></span>
			<?php endif;?>
		</div>
</div>



<div class="control-group <?php echo !empty($dateError)?'error':'';?>">
									<label class="control-label">Date</label>
									<div class="controls">	
										<input name="date" type="date" placeholder="mm/dd/yyyy" value="<?php echo !empty($date)?$date:'';?>">
										<?php if (!empty($dateError)): ?>
										<span class="help-inline"><?php echo $dateError;?></span>
										<?php endif;?>
									</div>
								</div>

<div class="control-group <?php echo !empty($dateError)?'error':'';?>">
									<label class="control-label">Time</label>
									<div class="controls">	
										<input name="time" type="time" placeholder="--:--" value="<?php echo !empty($time)?$time:'';?>">
										<?php if (!empty($timeError)): ?>
										<span class="help-inline"><?php echo $timeError;?></span>
										<?php endif;?>
									</div>
								</div>

<br>
						<div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn btn-danger" href="indexR.php">Back</a>
						</div>
				</form>
</div>
</body>
</html>
<?php
}
	public function displayRead(){
	 $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    if ( null==$id ) {
        header("Location: indexR.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tt_rounds where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
	?> <!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
	<link href="css/css.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script> </head> <body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Row</h3>
                    </div>
	<div class="list-right">

		<h2> Persons </h2>
		<ul>
			<?php
    			$pdo = Database::connect();
    			$sql = "SELECT * FROM tt_persons";
    			foreach ($pdo->query($sql) as $row) {
    				?><li><?php echo $row['id'] ?> = <?php echo $row['name']?></li><?php } Database:: disconnect();?>
		</ul>
<br><br>

		<h2> Courses </h2>
		<ul>
			<?php
    			$pdo = Database::connect();
    			$sql = "SELECT * FROM tt_courses";
    			foreach ($pdo->query($sql) as $row) {
    				?><li><?php echo $row['id']?> = <?php echo $row['name']?></li><?php } Database:: disconnect();?>
		</ul>
</div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Course ID</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['course_id'];?>
                            </label>
                        </div>
                      </div>
						<div class="form-horizontal">
							<div class="control-group">
								<label class="control-label">Player ID</label>
								<div class="controls">
									<label class="checkbox">
										<?php echo $data['person_id'];?>
									</label>
							</div>
						</div>
                      <div class="control-group">
                        <label class="control-label">Tee Time</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['time'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Tee Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['date'];?>
                            </label>
                        </div>
                      </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 1</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes01'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 2</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes02'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 3</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes03'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 4</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes04'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 5</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes05'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 6</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes06'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 7</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes07'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 8</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes08'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 9</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes09'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 10</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes10'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 11</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes11'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 12</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes12'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 13</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes13'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 14</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes14'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 15</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data[''];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 16</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes16'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 17</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes17'];?>
                                </label>
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Strokes 18</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['strokes18'];?>
                                </label>
                            </div>
                        </div>
                        <div class="form-actions">
                          <a class="btn btn-danger" href="indexR.php">Back</a>
                       </div>
                    </div>
                </div>
    </div> <!-- /container -->
  </body> </html> <?php
	}
	public function displayDelete(){
		 $id = 0;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tt_rounds WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: indexR.php");
    }
	?> <!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script> </head> <body>
    <div class="container">
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a Course</h3>
                    </div>
                    <form class="form-horizontal" action="deleteR.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn btn-success" href="indexR.php">No</a>
                        </div>
                    </form>
                </div>
    </div> <!-- /container -->
  </body> </html> <?php
	}
	public function displayUpdate(){
			$id = null;
			if ( !empty($_GET['id'])) {
				$id = $_REQUEST['id'];
			}
			 
			if ( null==$id ) {
				header("Location: indexR.php");
			}
			
			//(decision) If post is not empty, it means person submitted data
			// if $_post is empty, then pre-fill data
				if ( !empty($_POST)) {
					// keep track validation errors
					$courseError = null;
					$personError = null;
					$dateError = null;
					$timeError = null;
					$strokes01Error = null;
					$strokes02Error = null;
					$strokes03Error = null;
					$strokes04Error = null;
					$strokes05Error = null;
					$strokes06Error = null;
					$strokes07Error = null;
					$strokes08Error = null;
					$strokes09Error = null;
					$strokes10Error = null;
					$strokes11Error = null;
					$strokes12Error = null;
					$strokes13Error = null;
					$strokes14Error = null;
					$strokes15Error = null;
					$strokes16Error = null;
					$strokes17Error = null;
					$strokes18Error = null;
					 
					// keep track post values
					$course_id = $_POST['course_id'];
					$person_id = $_POST['person_id'];
					$date = $_POST['date'];
					$time = $_POST['time'];
					$strokes01 = $_POST['strokes01'];
					$strokes02 = $_POST['strokes02'];
					$strokes03 = $_POST['strokes03'];
					$strokes04 = $_POST['strokes04'];
					$strokes05 = $_POST['strokes05'];
					$strokes06 = $_POST['strokes06'];
					$strokes07 = $_POST['strokes07'];
					$strokes08 = $_POST['strokes08'];
					$strokes09 = $_POST['strokes09'];
					$strokes10 = $_POST['strokes10'];
					$strokes11 = $_POST['strokes11'];
					$strokes12 = $_POST['strokes12'];
					$strokes13 = $_POST['strokes13'];
					$strokes14 = $_POST['strokes14'];
					$strokes15 = $_POST['strokes15'];
					$strokes16 = $_POST['strokes16'];
					$strokes17 = $_POST['strokes17'];
					$strokes18 = $_POST['strokes18'];
					 
					// validate input
					$valid = true;
    $pdo2 = Database::connect();
    $sql2 = "SELECT * FROM tt_persons WHERE id = $person_id";
    $p = 0;

    foreach($pdo2->query($sql2) as $row2){
        $p = $row2['id'];
    }
    if($p == 0){
        $personError = 'Please enter a valid id number';
        $valid = false;
    }
    Database::disconnect();

    $pdo2 = Database::connect();
    $sql2 = "SELECT * FROM tt_courses WHERE id = $course_id";
    $c = 0;

    foreach($pdo2->query($sql2) as $row2){
        $c = $row2['id'];
    }
    if($c == 0){
        $courseError = 'Please enter a valid id number';
        $valid = false;
    }
    Database::disconnect();


					if (empty($date)) {
						$dateError = 'Please enter Date';
						$valid = false;
					}
					 
					if (empty($time)) {
						$timeError = 'Please enter Time';
						$valid = false;
					}
				 
					// update data
					if ($valid) {
						$pdo = Database::connect();
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE tt_rounds  set person_id = ?, course_id = ?, date = ?, time = ?, strokes01 = ?, strokes02 = ?, strokes03 = ?, strokes04 = ?, strokes05 = ?, strokes06 = ?, strokes07 = ?, strokes08 = ?, strokes09 = ?, strokes10 = ?, strokes11 = ?, strokes12 = ?, strokes13 = ?, strokes14 = ?, strokes15 = ?, strokes16 = ?, strokes17 = ?, strokes18 = ? WHERE id = ?";
						$q = $pdo->prepare($sql);
						$q->execute(array($person_id,$course_id,$date,$time,$strokes01,$strokes02,$strokes03,$strokes04,$strokes05,$strokes06,$strokes07,$strokes08,$strokes09,$strokes10,$strokes11,$strokes12,$strokes13,$strokes14,$strokes15,$strokes16,$strokes17,$strokes18,$id));
						Database::disconnect();
						header("Location: indexR.php");
					}
				} else {
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT * FROM tt_rounds where id = ?";
					$q = $pdo->prepare($sql);
					$q->execute(array($id));
					$data = $q->fetch(PDO::FETCH_ASSOC);
					$course_id = $data['course_id'];
					$person_id = $data['person_id'];
					$date = $data['date'];
					$time = $data['time'];
					$strokes01 = $data['strokes01'];
					$strokes02 = $data['strokes02'];
					$strokes03 = $data['strokes03'];
					$strokes04 = $data['strokes04'];
					$strokes05 = $data['strokes05'];
					$strokes06 = $data['strokes06'];
					$strokes07 = $data['strokes07'];
					$strokes08 = $data['strokes08'];
					$strokes09 = $data['strokes09'];
					$strokes10 = $data['strokes10'];
					$strokes11 = $data['strokes11'];
					$strokes12 = $data['strokes12'];
					$strokes13 = $data['strokes13'];
					$strokes14 = $data['strokes14'];
					$strokes15 = $data['strokes15'];
					$strokes16 = $data['strokes16'];
					$strokes17 = $data['strokes17'];
					$strokes18 = $data['strokes18'];
					Database::disconnect();
				}
			?>
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<title>TeeTyme - Update Round Info</title>
				<meta charset="utf-8">
				<link   href="css/bootstrap.min.css" rel="stylesheet">
				<link href="css/css.css" rel="stylesheet">
				<script src="js/bootstrap.min.js"></script>
			</head>
			 
			<body>
				<div class="container">
				 
							<div class="span10 offset1">
								<div class="row">
									<h3>Update Round </h3>
								</div>
						 
								<form class="form-horizontal" action="updateR.php?id=<?php echo $id?>" method="post">
    <div class="list-right">

        <h2> Persons </h2>
        <ul>
            <?php
                $pdo = Database::connect();
                $sql = "SELECT * FROM tt_persons";
                foreach ($pdo->query($sql) as $row) {
                    ?><li><?php echo $row['id'] ?> = <?php echo $row['name']?></li><?php } Database:: disconnect();?>
        </ul>
<br><br>

        <h2> Courses </h2>
        <ul>
            <?php
                $pdo = Database::connect();
                $sql = "SELECT * FROM tt_courses";
                foreach ($pdo->query($sql) as $row) {
                    ?><li><?php echo $row['id']?> = <?php echo $row['name']?></li><?php } Database:: disconnect();?>
        </ul>
</div>
 <div class="control-group <?php echo !empty($courseError)?'error':'';?>">
                                    <label class="control-label">Course ID</label>
                                    <div class="controls">
                                        <input name="course_id" type="text"  placeholder="Course ID" value="<?php echo !empty($course_id)?$course_id:'';?>">
                                        <?php if(!empty($courseError)):?>
                                            <span class="help-line"><?php echo $courseError;?></span>
                                        <?php endif; ?>
                                    </div>
                                  </div>

<div class="control-group <?php echo !empty($personError)?'error':'';?>">
    <label class="control-label">Person ID </label>
        <div class="controls">
            <input name="person_id" type="text" placeholder="Person ID" value="<?php echo !empty($person_id)?$person_id:'';?>">
            <?php if(!empty($personError)): ?>
                <span class="help-line"><?php echo $personError;?></span>
            <?php endif;?>
        </div>
</div>

								  <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
									<label class="control-label">Date</label>
									<div class="controls">
										<input name="date" type="date"  placeholder="Date" value="<?php echo !empty($date)?$date:'';?>">
										<?php if (!empty($dateError)): ?>
											<span class="help-inline"><?php echo $dateError;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($timeError)?'error':'';?>">
									<label class="control-label">Time</label>
									<div class="controls">
										<input name="time" type="time"  placeholder="Time" value="<?php echo !empty($time)?$time:'';?>">
										<?php if (!empty($timeError)): ?>
											<span class="help-inline"><?php echo $timeError;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($hole01Error)?'error':'';?>">
									<label class="control-label">Strokes 01</label>
									<div class="controls">
										<input name="strokes01" type="text"  placeholder="Strokes 01" value="<?php echo !empty($strokes01)?$strokes01:'';?>">
										<?php if (!empty($strokes01Error)): ?>
											<span class="help-inline"><?php echo $strokes01Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes02Error)?'error':'';?>">
									<label class="control-label">Strokes 02</label>
									<div class="controls">
										<input name="strokes02" type="text"  placeholder="Strokes 02" value="<?php echo !empty($strokes02)?$strokes02:'';?>">
										<?php if (!empty($strokes02Error)): ?>
											<span class="help-inline"><?php echo $strokes02Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes03Error)?'error':'';?>">
									<label class="control-label">Strokes 03</label>
									<div class="controls">
										<input name="strokes03" type="text"  placeholder="Strokes 03" value="<?php echo !empty($strokes03)?$strokes03:'';?>">
										<?php if (!empty($strokes03Error)): ?>
											<span class="help-inline"><?php echo $strokes03Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes04Error)?'error':'';?>">
									<label class="control-label">Strokes 04</label>
									<div class="controls">
										<input name="strokes04" type="text"  placeholder="Strokes 04" value="<?php echo !empty($strokes04)?$strokes04:'';?>">
										<?php if (!empty($strokes04Error)): ?>
											<span class="help-inline"><?php echo $strokes04Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes05Error)?'error':'';?>">
									<label class="control-label">Strokes 05</label>
									<div class="controls">
										<input name="strokes05" type="text"  placeholder="Strokes 05" value="<?php echo !empty($strokes05)?$strokes05:'';?>">
										<?php if (!empty($strokes05Error)): ?>
											<span class="help-inline"><?php echo $strokes05Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes06Error)?'error':'';?>">
									<label class="control-label">Strokes 06</label>
									<div class="controls">
										<input name="strokes06" type="text"  placeholder="Strokes 06" value="<?php echo !empty($strokes06)?$strokes06:'';?>">
										<?php if (!empty($strokes06Error)): ?>
											<span class="help-inline"><?php echo $strokes06Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes07Error)?'error':'';?>">
									<label class="control-label">Strokes 07</label>
									<div class="controls">
										<input name="strokes07" type="text"  placeholder="Strokes 07" value="<?php echo !empty($strokes07)?$strokes07:'';?>">
										<?php if (!empty($strokes07Error)): ?>
											<span class="help-inline"><?php echo $strokes07Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes08Error)?'error':'';?>">
									<label class="control-label">Strokes 08</label>
									<div class="controls">
										<input name="strokes08" type="text"  placeholder="Strokes 08" value="<?php echo !empty($strokes08)?$strokes08:'';?>">
										<?php if (!empty($strokes08Error)): ?>
											<span class="help-inline"><?php echo $strokes08Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes09Error)?'error':'';?>">
									<label class="control-label">Strokes 09</label>
									<div class="controls">
										<input name="strokes09" type="text"  placeholder="Strokes 09" value="<?php echo !empty($strokes09)?$strokes09:'';?>">
										<?php if (!empty($strokes09Error)): ?>
											<span class="help-inline"><?php echo $strokes09Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes10Error)?'error':'';?>">
									<label class="control-label">Strokes 10</label>
									<div class="controls">
										<input name="strokes10" type="text"  placeholder="Strokes 10" value="<?php echo !empty($strokes10)?$strokes10:'';?>">
										<?php if (!empty($strokes10Error)): ?>
											<span class="help-inline"><?php echo $strokes10Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes11Error)?'error':'';?>">
									<label class="control-label">Strokes 11</label>
									<div class="controls">
										<input name="strokes11" type="text"  placeholder="Strokes 11" value="<?php echo !empty($strokes11)?$strokes11:'';?>">
										<?php if (!empty($strokes11Error)): ?>
											<span class="help-inline"><?php echo $strokes11Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes12Error)?'error':'';?>">
									<label class="control-label">Strokes 12</label>
									<div class="controls">
										<input name="strokes12" type="text"  placeholder="Strokes 12" value="<?php echo !empty($strokes12)?$strokes12:'';?>">
										<?php if (!empty($strokes12Error)): ?>
											<span class="help-inline"><?php echo $strokes12Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes13Error)?'error':'';?>">
									<label class="control-label">Strokes 13</label>
									<div class="controls">
										<input name="strokes13" type="text"  placeholder="Strokes 13" value="<?php echo !empty($strokes13)?$strokes13:'';?>">
										<?php if (!empty($strokes13Error)): ?>
											<span class="help-inline"><?php echo $strokes13Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes14Error)?'error':'';?>">
									<label class="control-label">Strokes 14</label>
									<div class="controls">
										<input name="strokes14" type="text"  placeholder="Strokes 14" value="<?php echo !empty($strokes14)?$strokes14:'';?>">
										<?php if (!empty($strokes14Error)): ?>
											<span class="help-inline"><?php echo $strokes14Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes15Error)?'error':'';?>">
									<label class="control-label">Strokes 15</label>
									<div class="controls">
										<input name="strokes15" type="text"  placeholder="Strokes 15" value="<?php echo !empty($strokes15)?$strokes15:'';?>">
										<?php if (!empty($strokes15Error)): ?>
											<span class="help-inline"><?php echo $strokes15Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes16Error)?'error':'';?>">
									<label class="control-label">Strokes 16</label>
									<div class="controls">
										<input name="strokes16" type="text"  placeholder="Strokes 16" value="<?php echo !empty($strokes16)?$strokes16:'';?>">
										<?php if (!empty($strokes16Error)): ?>
											<span class="help-inline"><?php echo $strokes16Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes17Error)?'error':'';?>">
									<label class="control-label">Strokes 17</label>
									<div class="controls">
										<input name="strokes17" type="text"  placeholder="Strokes 17" value="<?php echo !empty($strokes17)?$strokes17:'';?>">
										<?php if (!empty($strokes17Error)): ?>
											<span class="help-inline"><?php echo $strokes17Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="control-group <?php echo !empty($strokes18Error)?'error':'';?>">
									<label class="control-label">Strokes 18</label>
									<div class="controls">
										<input name="strokes18" type="text"  placeholder="Strokes 18" value="<?php echo !empty($strokes18)?$strokes18:'';?>">
										<?php if (!empty($strokes18Error)): ?>
											<span class="help-inline"><?php echo $strokes18Error;?></span>
										<?php endif;?>
									</div>
								  </div>
								  <div class="form-actions">
									  <button type="submit" class="btn btn-success">Update</button>
									  <a class="btn btn-danger" href="indexR.php">Back</a>
									</div>
								</form>
							</div>
				</div> <!-- /container -->
			  </body>
			</html>

<?php
	}
}
?>
