<?php 
	include_once('config.php');//baza
	$db = new Database();

	if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$password = md5($password);
         //Sql se odnosi na korisnike sa user_status_id=1 jer su to aktivni korisnici. 
		$sql = 'SELECT * FROM user WHERE username = ? AND password = ? AND user_status_id=1';
		$result = $db->getRow($sql, [$username, $password]);
		//echo print_r($result);
       
		if($result){
			$r = $result['user_type_id'];

			if($r == '2'){
				$_SESSION['logged'] = '2';
				header('location: Admin/index.php');
			}else{
				$_SESSION['logged'] = '1';

				$_SESSION['userID'] = $result['user_id'];

				header('location: User/index.php');
			}
		}//if true

	}//end if isset log in
	

	
 ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Car Reservation</title>

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
<br />
<br />
<br />
<br />
<br />
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Login | here</h3>
					</div>
					<div class="panel-body">
						 <form action="" method="post">
							 	<div class="form-group">
							    <label for="inputdefault">Username:</label>
							    <input class="form-control" name="username" type="text" required autofocus
							    value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>"
							    >
							  </div>

							   <div class="form-group">
							    <label for="inputdefault">Password:</label>
							    <input class="form-control" name="password" type="password" required>
							  </div>

							  <button class="btn btn-info" type="submit" name="login">
							  	Login
							  	<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
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