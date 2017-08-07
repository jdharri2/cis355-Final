
<?php
	include 'database.php'; //	include 'crud.php';
	class Courses{ //implements Table {
		private $id;
		private $name;
		private $email;
		private $mobile;
		private $address;
		private $city;
		private $state;
		private $zip;
		private $par01;
		private $par02;
		private $par03;
		private $par04;
		private $par05;
		private $par06;
		private $par07;
		private $par08;
		private $par09;
		private $par10;
		private $par11;
		private $par12;
		private $par13;
		private $par14;
		private $par15;
		private $par16;
		private $par17;
		private $par18;
		//constructor
		function __construct($id,$fname,$lname,$email,$mobile){
			$this->id = $id;
			$this->name = $name;
			$this->email = $email;
			$this->mobile = $mobile;
			$this->address = $address;
			$this->city = $city;
			$this->state = $state;
			$this->zip = $zip;
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
    		<link href="css/bootstrap.min.css" rel="stylesheet">
    		<script src="js/bootstrap.min.js"></script>
			<link href="css/css.css" rel="stylesheet">
		</head>
		<body>
<h1>		<a href="indexP.php">Players</a> <a href="indexC.php">Courses</a> <a href="indexR.php">Rounds</a></h1>

    		<div class="container">
            	<div class="row">
                	<h3>Courses Table</h3>
            	</div>
            	<div class="row">
					<p> <a href="createC.php" class="btn btn-success">Create</a><a id="home" class="btn btn-danger" href="home.php">Home</a> </p>
                	<table class="table table-striped table-bordered">
                  		<thead>
                    		<tr>
                      		<th>Name </th>
                      		<th>Email Address</th>
                      		<th>Mobile Number</th>
							<th>Address </th>
							<th>City </th>
							<th>State </th>
							<th>Zip </th>
							 <th>Par 1 </th>
							 <th>Par 2 </th>
							 <th>Par 3 </th>
							 <th>Par 4 </th>
							 <th>Par 5 </th>
							 <th>Par 6 </th>
							 <th>Par 7 </th>
							 <th>Par 8 </th>
							 <th>Par 9 </th>
							 <th>Par 10 </th>
							 <th>Par 11 </th>
							 <th>Par 12 </th>
							 <th>Par 13 </th>
							 <th>Par 14 </th>
							 <th>Par 15 </th>
							 <th>Par 16 </th>
							 <th>Par 17 </th>
							 <th>Par 18 </th>
							 <th> Action </th>
                    		</tr>
                  		</thead>
                 <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM tt_courses ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
							echo '<td>'. $row['mobile'] . '</td>';
                            echo '<td>'. $row['address'] . '</td>';
 							echo '<td>'. $row['city'] . '</td>';
							echo '<td>'. $row['state'] . '</td>';
							echo '<td>'. $row['zip'] . '</td>';
							echo '<td>'. $row['par01'] . '</td>';
							echo '<td>'. $row['par02'] . '</td>';
							echo '<td>'. $row['par03'] . '</td>';
							echo '<td>'. $row['par04'] . '</td>';
							echo '<td>'. $row['par05'] . '</td>';
							echo '<td>'. $row['par06'] . '</td>';
							echo '<td>'. $row['par07'] . '</td>';
							echo '<td>'. $row['par08'] . '</td>';
							echo '<td>'. $row['par09'] . '</td>';
							echo '<td>'. $row['par10'] . '</td>';
							echo '<td>'. $row['par11'] . '</td>';
							echo '<td>'. $row['par12'] . '</td>';
							echo '<td>'. $row['par13'] . '</td>';
							echo '<td>'. $row['par14'] . '</td>';
							echo '<td>'. $row['par15'] . '</td>';
							echo '<td>'. $row['par16'] . '</td>';
							echo '<td>'. $row['par17'] . '</td>';
							echo '<td>'. $row['par18'] . '</td>';
                            echo '<td> <a class="btn btn-info" href="readC.php?id='.$row['id'].'">Read</a>
                            <a class="btn btn-success" href="updateC.php?id='.$row['id'].'">Update</a>
                            <a class="btn btn-danger" href="deleteC.php?id='.$row['id'].'">Delete</a></td>';
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
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
        // keep track post values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['state'];
		$par01 = $_POST['par01'];
        $par02 = $_POST['par02'];
        $par03 = $_POST['par03'];
        $par04 = $_POST['par04'];
        $par05 = $_POST['par05'];
        $par06 = $_POST['par06'];
        $par07 = $_POST['par07'];
        $par08 = $_POST['par08'];
        $par09 = $_POST['par09'];
        $par10 = $_POST['par10'];
        $par11 = $_POST['par11'];
        $par12 = $_POST['par12'];
        $par13 = $_POST['par13'];
        $par14 = $_POST['par14'];
        $par15 = $_POST['par15'];
        $par16 = $_POST['par16'];
        $par17 = $_POST['par17'];
        $par18 = $_POST['par18'];
        //validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
       if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
       }
        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }
         //insert data
        if ($valid) {
 	        $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tt_courses (name,email,mobile,address,city,state,zip,par01,par02,par03,par04,par05,par06,par07,par08,par09,par10,par11,par12,par13,par14,par15,par16,par17,par18) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$mobile,$address,$city,$state,$zip,$par01,$par02,$par03,$par04,$par05,$par06,$par07,$par08,$par09,$par10,$par11,$par12,$par13,$par14,$par15,$par16,$par17,$par18));
            Database::disconnect();
            header("Location: indexC.php");
        }
   }
?> <!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script> </head> <body>
    <div class="container">
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Course</h3>
                    </div>
                    <form class="form-horizontal" action="createC.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?> <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <input name="mobile" type="text" placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
                            <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
						<div class="control-group">
							<label class="control-label">Address</label>
							<div class="controls">
								<input name="address" type="text" placeholder="Address" value="<?php echo !empty($address)?$address:'';?>">
							</div>
						</div>
 						<div class="control-group">
                            <label class="control-label">City</label>
                    <div class="controls">
                          <input name="city" type="text" placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
                        </div>
                      </div>
						<div class="control-group">
                            <label class="control-label">State</label>
                            <div class="controls">
                                <input name="state" type="text" placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label">Zip</label>
                            <div class="controls">
                                <input name="zip" type="text" placeholder="Zip" value="<?php echo !empty($zip)?$zip:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 1</label>
                            <div class="controls">
                                <input name="par01" type="text" placeholder="Par 1" value="<?php echo !empty($par01)?$par01:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 2</label>
                            <div class="controls">
                                <input name="par02" type="text" placeholder="Par 2" value="<?php echo !empty($par02)?$par02:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 3</label>
                            <div class="controls">
                               <input name="par03" type="text" placeholder="Par 3" value="<?php echo !empty($par03)?$par03:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 4</label>
                            <div class="controls">
                                <input name="par04" type="text" placeholder="Par 4" value="<?php echo !empty($par04)?$par04:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 5</label>
                            <div class="controls">
                                <input name="par05" type="text" placeholder="Par 5" value="<?php echo !empty($par05)?$par05:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 6</label>
                            <div class="controls">
                                <input name="par06" type="text" placeholder="Par 6" value="<?php echo !empty($par06)?$par06:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 7</label>
                            <div class="controls">
                                <input name="par07" type="text" placeholder="Par 7" value="<?php echo !empty($par07)?$par07:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 8</label>
                            <div class="controls">
                                <input name="par08" type="text" placeholder="Par 8" value="<?php echo !empty($par08)?$par08:'';?>">
                            </div>
                        </div>
					 <div class="control-group">
                            <label class="control-label">Par 9</label>
                            <div class="controls">
                                <input name="par09" type="text" placeholder="Par 9" value="<?php echo !empty($par09)?$par09:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 10</label>
                            <div class="controls">
                                <input name="par10" type="text" placeholder="Par 10" value="<?php echo !empty($par10)?$par10:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 11</label>
                            <div class="controls">
                                <input name="par11" type="text" placeholder="Par 11" value="<?php echo !empty($par11)?$par11:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 12</label>
                            <div class="controls">
                                <input name="par12" type="text" placeholder="Par 12" value="<?php echo !empty($par12)?$par12:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 13</label>
                            <div class="controls">
                              <input name="par13" type="text" placeholder="Par 13" value="<?php echo !empty($par13)?$par13:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 14</label>
                            <div class="controls">
                                <input name="par14" type="text" placeholder="Par 14" value="<?php echo !empty($par14)?$par14:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 15</label>
                            <div class="controls">
                                <input name="par15" type="text" placeholder="Par 15" value="<?php echo !empty($par15)?$par15:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 16</label>
                           <div class="controls">
                                <input name="par16" type="text" placeholder="Par 16" value="<?php echo !empty($par16)?$par16:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 17</label>
                            <div class="controls">
                                <input name="par17" type="text" placeholder="Par 17" value="<?php echo !empty($par17)?$par17:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 18</label>
                            <div class="controls">
                              <input name="par18" type="text" placeholder="Par 18" value="<?php echo !empty($par18)?$par18:'';?>">
                            </div>
                        </div>
                      <div class="form-actions">
							<br>
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn btn-danger" href="indexC.php">Back</a>
                        </div>
                    </form>
                </div>
    </div> <!-- /container -->
  </body> </html> <?php
	}
	public function displayRead(){
	 $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    if ( null==$id ) {
        header("Location: indexC.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tt_courses where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
	?> <!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script> </head> <body>
    <div class="container">
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Course</h3>
                    </div>
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['mobile'];?>
                            </label>
                        </div>
                      </div>
						<div class="control-group">
							<label class="control-label">Address</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $data['address'];?>
								</label>
							</div>
						</div>

 <div class="control-group">
                            <label class="control-label">City</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['city'];?>
                                </label>
                            </div>
                        </div>
 <div class="control-group">
                            <label class="control-label">State</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['state'];?>
                                </label>
                            </div>
                        </div>
 <div class="control-group">
                            <label class="control-label">zip</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['zip'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 1</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par01'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 2</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par02'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 3</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par03'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 4</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par04'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 5</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par05'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 6</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par06'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 7</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par07'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 8</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par08'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 9</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par09'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 10</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par10'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 11</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par11'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 12</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par12'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 13</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par13'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 14</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par14'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 15</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par15'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 16</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par16'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 17</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par17'];?>
                                </label>
                            </div>
                        </div>

						 <div class="control-group">
                            <label class="control-label">Par 18</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['par18'];?>
                                </label>
                            </div>
                        </div>

                        <div class="form-actions">
                          <a class="btn btn-danger" href="indexC.php">Back</a>
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
        $sql = "DELETE FROM tt_courses WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: indexC.php");
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
                    <form class="form-horizontal" action="deleteC.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn btn-success" href="indexC.php">No</a>
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
        header("Location: indexC.php");
    }
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
        // keep track post values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['state'];
		$par01 = $_POST['par01'];
        $par02 = $_POST['par02'];
        $par03 = $_POST['par03'];
        $par04 = $_POST['par04'];
        $par05 = $_POST['par05'];
        $par06 = $_POST['par06'];
        $par07 = $_POST['par07'];
        $par08 = $_POST['par08'];
        $par09 = $_POST['par09'];
        $par10 = $_POST['par10'];
        $par11 = $_POST['par11'];
        $par12 = $_POST['par12'];
        $par13 = $_POST['par13'];
        $par14 = $_POST['par14'];
        $par15 = $_POST['par15'];
        $par16 = $_POST['par16'];
        $par17 = $_POST['par17'];
        $par18 = $_POST['par18'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tt_courses set name = ?, email = ?, mobile =?, address=?, city=?, state=?, zip=?, par01=?, par02=?, par03=?, par04=?, par05=?, par06=?, par07=?, par08=?, par09=?, par10=?, par11=?, par12=?, par13=?, par14=?, par15=?, par16=?, par17=?,par18=? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$mobile,$address,$city,$state,$zip,$par01,$par02,$par03,$par04,$par05,$par06,$par07,$par08,$par09,$par10,$par11,$par12,$par13,$par14,$par15,$par16,$par17,$par18,$id));
            Database::disconnect();
            header("Location: indexC.php");
        }
		    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tt_courses where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['name'];
        $email = $data['email'];
        $mobile = $data['mobile'];
		$address = $data['address'];
		$city = $data['city'];
		$state = $data['state'];
		$zip = $data['zip'];
		$par01 = $data['par01'];
		$par02 = $data['par02'];
		$par03 = $data['par03'];
		$par04 = $data['par04'];
		$par05 = $data['par05'];
		$par06 = $data['par06'];
		$par07 = $data['par07'];
		$par08 = $data['par08'];
		$par09 = $data['par09'];
		$par10 = $data['par10'];
		$par11 = $data['par11'];
		$par12 = $data['par12'];
		$par13 = $data['par13'];
		$par14 = $data['par14'];
		$par15 = $data['par15'];
		$par16 = $data['par16'];
		$par17 = $data['par17'];
		$par18 = $data['par18'];
        Database::disconnect();
    }
?> <!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script> </head> <body>
    <div class="container">
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Customer</h3>
                    </div>
                    <form class="form-horizontal" action="updateC.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <input name="mobile" type="text" placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
                            <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                            <?php endif;?>
                        </div>
                      </div> <div class="control-group">
							<label class="control-label">Address</label>
							<div class="controls">
								<input name="address" type="text" placeholder="Address" value="<?php echo !empty($address)?$address:'';?>">
							</div>
						</div>
 						<div class="control-group">
                            <label class="control-label">City</label>
                    <div class="controls">
                          <input name="city" type="text" placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
                        </div>
                      </div>
						<div class="control-group">
                            <label class="control-label">State</label>
                            <div class="controls">
                                <input name="state" type="text" placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label">Zip</label>
                            <div class="controls">
                                <input name="zip" type="text" placeholder="Zip" value="<?php echo !empty($zip)?$zip:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 1</label>
                            <div class="controls">
                                <input name="par01" type="text" placeholder="Par 1" value="<?php echo !empty($par01)?$par01:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 2</label>
                            <div class="controls">
                                <input name="par02" type="text" placeholder="Par 2" value="<?php echo !empty($par02)?$par02:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 3</label>
                            <div class="controls">
                               <input name="par03" type="text" placeholder="Par 3" value="<?php echo !empty($par03)?$par03:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 4</label>
                            <div class="controls">
                                <input name="par04" type="text" placeholder="Par 4" value="<?php echo !empty($par04)?$par04:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 5</label>
                            <div class="controls">
                                <input name="par05" type="text" placeholder="Par 5" value="<?php echo !empty($par05)?$par05:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 6</label>
                            <div class="controls">
                                <input name="par06" type="text" placeholder="Par 6" value="<?php echo !empty($par06)?$par06:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 7</label>
                            <div class="controls">
                                <input name="par07" type="text" placeholder="Par 7" value="<?php echo !empty($par07)?$par07:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 8</label>
                            <div class="controls">
                                <input name="par08" type="text" placeholder="Par 8" value="<?php echo !empty($par08)?$par08:'';?>">
                            </div>
                        </div>
					 <div class="control-group">
                            <label class="control-label">Par 9</label>
                            <div class="controls">
                                <input name="par09" type="text" placeholder="Par 9" value="<?php echo !empty($par09)?$par09:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 10</label>
                            <div class="controls">
                                <input name="par10" type="text" placeholder="Par 10" value="<?php echo !empty($par10)?$par10:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 11</label>
                            <div class="controls">
                                <input name="par11" type="text" placeholder="Par 11" value="<?php echo !empty($par11)?$par11:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 12</label>
                            <div class="controls">
                                <input name="par12" type="text" placeholder="Par 12" value="<?php echo !empty($par12)?$par12:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 13</label>
                            <div class="controls">
                              <input name="par13" type="text" placeholder="Par 13" value="<?php echo !empty($par13)?$par13:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 14</label>
                            <div class="controls">
                                <input name="par14" type="text" placeholder="Par 14" value="<?php echo !empty($par14)?$par14:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 15</label>
                            <div class="controls">
                                <input name="par15" type="text" placeholder="Par 15" value="<?php echo !empty($par15)?$par15:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 16</label>
                           <div class="controls">
                                <input name="par16" type="text" placeholder="Par 16" value="<?php echo !empty($par16)?$par16:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 17</label>
                            <div class="controls">
                                <input name="par17" type="text" placeholder="Par 17" value="<?php echo !empty($par17)?$par17:'';?>">
                            </div>
                        </div>
						 <div class="control-group">
                            <label class="control-label">Par 18</label>
                            <div class="controls">
                              <input name="par18" type="text" placeholder="Par 18" value="<?php echo !empty($par18)?$par18:'';?>">
                            </div>
                        </div> <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn btn-danger" href="indexC.php">Back</a>
                        </div>
                    </form>
                </div>
    </div> <!-- /container -->
  </body> </html> <?php
	}
}
?>
