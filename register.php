<?php 
include_once('config.php'); //BAZA
$db = new Database();


 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Boat Reservation</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.dataTables.css">

	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>



	<body>
<br />
 		<div class="row">
 			<div class="col-md-4"></div>
 			<div class="col-md-4">
 				<?php 
						if(isset($_POST['submit'])){
							
							$firstName = $_POST['fN'];
							$lastName = $_POST['lN'];
							
							$address = $_POST['add'];
							$contact =  $_POST['cont'];
							$email = $_POST['email'];
							$username=  $_POST['uN'];
							$password1 = $_POST['password1'];
							$password2 = $_POST['password2'];

							if($password1 != $password2){
								echo '
									<div class="alert alert-danger">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  <strong>Error!</strong> Password not match.
									</div>
								';
							}else//end if
							{

								$password = md5($password1);
								$sql = '
									INSERT INTO user(first_name,  last_name, adress, contact,email, username, password, user_type_id)
									VALUES(?,?,?,?,?,?,?, 1);
								';

								$result = $db->insertRow($sql, [$firstName, $lastName, $address, $contact,$email, $username, $password]);
								if($result){
									header('location: login.php');
								}

							}

						

						}
					 ?>
 				<div class="panel panel-info">
				  <div class="panel-heading">Registration Process</div>
					  <div class="panel-body">
						 <form action="" method="post">
						 	<div class="form-group">
							 	 <label for="fN">First Name:</label>
							 	 <input type="text" class="form-control" name="fN" id="fN" 
							 	 value="<?php if(isset($firstName)){echo $firstName;} ?>"
							 	 required autofocus>
							</div>


							<div class="form-group">
							 	 <label for="lN">Last Name:</label>
							 	 <input type="text" class="form-control" name="lN" id="lN" 
							 	 value="<?php if(isset($lastName)){echo $lastName;} ?>"
							 	 required>
							</div>	

							<div class="form-group">
							 	 <label for="add">Address:</label>
							 	 <input type="text" class="form-control" name="add" id="add" 
							 	 value="<?php if(isset($address)){echo $address;} ?>"
							 	 required>
							</div>	


							<div class="form-group">
							 	 <label for="cont">Contact #:</label>
							 	 <input type="text" placeholder="Phone Number" class="form-control" name="cont" id="cont" 
							 	  value="<?php if(isset($contact)){echo $contact;} ?>"
							 	 required>
							</div>
							<div class="form-group">
							 	 <label for="cont">Email #:</label>
							 	 <input type="text"placeholder="email@email.com" class="form-control" name="email" id="cont" 
							 	  value="<?php if(isset($email)){echo $email;} ?>"
							 	 required>
							</div>

							<div class="form-group">
							 	 <label for="uN">Username:</label>
							 	 <input type="text" class="form-control" name="uN" id="uN" 
							 	  value="<?php if(isset($username)){echo $username;} ?>"
							 	 required>
							</div>	

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									 	 <label for="pass1">Password:</label>
									 	 <input type="password" class="form-control" name="password1" id="password1" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									 	 <label for="pass2">Password:</label>
									 	 <input type="password" class="form-control" name="password2" id="password2" required>
									</div>
								</div>
							</div>	

							<button type="submit" name="submit" class="btn btn-info">
								Submit
								<span class="glyphicon glyphicon-check"></span>
							</button>					 
						 </form> 	
					  </div>
				</div>
 			</div>
 			<div class="col-md-4"></div>
 		</div>

		<footer style="background-color: white;">
			<center>
				&copy; 2019
			</center>
		</footer>

 		<script src="bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="bootstrap/js/dataTables.js"></script>
 		<script src="bootstrap/js/dataTables2.js"></script>
 		<script src="bootstrap/js/bootstrap.js"></script>

	</body>
</html>