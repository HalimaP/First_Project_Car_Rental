

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Car Reservation</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/styleButton.css">
	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>

	<body>

		<br />
		<br />
		<br />
		
	
			

		<!-- begin whole content -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img src="../img/carlogo.jpg" height="50" width="50"> &nbsp;
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Times New Roman; font-size: 30px;">Car Reservation</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<li>
								<button class="My"><a href="index.php">Cars</a></button>
								
							</li>

							<li  class="active">
								<button class="My"><a href="reservation.php">My Reservation</a></button>
								
							</li>

							<li  class="active">
								<button class="My"><a href="showUser.php">Registered Users</a></button>

							</li>
							<li  class="active">
								<button class="My"><a href="profile2.php">Account</a></button>

							</li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right" style="font-family: Times New Roman;">
							<li>
								<?php include_once('../Includes/logout.php'); ?>
							</li>
						
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<!-- end -->

		<br />

		
		<!-- main cntent -->
		<div class="container-fluid">

			<div class="col-md-3"></div>
			<div class="col-md-6">
				<a href="index.php" class="btn btn-success">
					Back
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
				</a>
			<br />
			<br />

				<?php 

					include_once('../config.php');//database
					$db = new Database();

					if(isset($_POST['newCar']))
						{
							$carName = $_POST['car_tytle'];
							$carCapasity = $_POST['seating_capasity'];
							$carOverview = $_POST['car_overview'];

							$cPrice = null;
							if($carCapasity == '4 Persons'){
								$cPrice = 50;
							}else if($carCapasity == '9 Persons'){
								$cPrice = 100;
							}else{
								$cPrice = 70;
							}//end if else of arCapasity price

							$sql = "INSERT INTO car (car_tytle, seating_capasity, car_overview,image, daily_price)
									VALUES(?,?,?,?,?);
								";
							

							if(!$carName){
								echo '
										<div class="alert alert-danger">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Error!</strong> Car Name is Required.
										</div>
									';
							}else if(!$carOverview){
								echo '
										<div class="alert alert-danger">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Error!</strong> Car Overview is Required.
										</div>
									';
							}else{

								$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
								// neke provjere da bih bila sigurna da je datoteka koju imam slika 
								move_uploaded_file($_FILES["image"]["tmp_name"], "../car_image/".$new_image_name);
								$new_image_name = '../car_image/'.$new_image_name;
								//echo $new_image_name;

								if(empty($_FILES["image"]["tmp_name"])){
									$new_image_name = '../car_image/'.'default.png'; 
								}

								$res = $db->insertRow($sql, [$carName,$carCapasity,$carOverview, $new_image_name, $cPrice]);
								if($res)
								{
									echo '
										<div class="alert alert-success">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Success!</strong> Save Successfully.
										</div>
									';
								}//end if $ress
							}
						}
				?>



				<form action = "" method = "POST" enctype="multipart/form-data">

					   <div class="form-group">
					    <label for="inputdefault">Car Name:</label>
					    <input class="form-control" id="inputdefault"  name="car_tytle" type="text">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Car Description:</label>
					    <input class="form-control" id="inputdefault" name="car_overview" type="text">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Car Capacity:</label><br />
					    <select name = "seating_capasity" class = "btn-lg" style = "width:250px;">
					    	<option value = "4 Persons">4 Persons</option>
					    	<option value = "6 Persons">6 Persons</option>
					    	<option value = "9 Persons">9 Persons</option>
					    </select>
					  </div>

					    <div class="form-group">
				    	  <label for="inputdefault">Car Picture:</label>
					      <input class="form-control" id="inputdefault" name="image" type="file">
					    </div>

					  <button class="btn btn-info" name = "newCar">
					  		Save
					  		<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
					  </button>
				</form>	
			</div>
			<div class="col-md-3"></div>
		</div>
		<!-- main sadržaj -->



 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/jquery.dataTables.js"></script>
 		<script src="../bootstrap/js/jquery.dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>

	</body>
</html>