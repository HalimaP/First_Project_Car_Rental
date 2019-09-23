<?php 

	include_once('../config.php');//DATABASE
	$db = new Database();
?>

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
		
	
			

		<!-- početak kompletnog sadržaja -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle grupiraju se radi boljeg prikaza mobilnih uređaja -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img src="../img/carlogo.jpg" height="50" width="50"> &nbsp;
					</div>
			
					<!-- Prikupljanje navigacijske veze, obrazaca i drugih sadržaja za prebacivanje -->
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
								<?php include_once('../includes/logout.php'); ?>
							</li>
						
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<!-- end -->

		<br />

		
		<!-- main sadržaj -->
		<div class="container-fluid">

			<div class="col-md-3"></div>
			<div class="col-md-6">
				<a href="index.php" class="btn btn-success">
					Back
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
				</a>
			<br />
			<br />

			

				<form action = "" method = "POST" enctype="multipart/form-data">
						<?php 
							//prikaz automobila
							if(isset($_GET['editid']))
								{
									$editid = $_GET['editid'];

									$sql = "SELECT * FROM car WHERE car_id = ?";
									$res = $db->getRow($sql, [$editid]);
									$carName =  $res['car_tytle'];
									$overview =  $res['car_overview'];
									$carCapasity =  $res['seating_capasity'];
									$getOldCarImg = $res['image'];
								    
								 }

								 //uređivanje automobila

								 if(isset($_POST['updatecar']))
								 	{
								 		$editid = $_POST['car_id'];

								 		$carName = $_POST['car_tytle'];
								 		$overview = $_POST['car_overview'];
								 		$carCapasity = $_POST['seating_capasity'];
								 		$OldCarImg= $_POST['oldImage'];
                                        
								 		
										$carPrice = null;
										if($carCapasity == '4 Persons'){
											$carPrice = 50;
										}else if($carCapasity == '9 Persons'){
											$carPrice = 100;
										}else{
											$carPrice = 70;
										}//end if else of  price


								 		//odabir stare slike za brisanje iz Upload foldera
								 		// echo print_r($cimg);


										$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
										// neke provjere da bih bila sigurna da je datoteka koju imam slika 
										move_uploaded_file($_FILES["cimg"]["tmp_name"], "../car_image/".$new_image_name);
										$new_image_name = '../car_image/'.$new_image_name;

										if(empty($_FILES["car_image"]["tmp_name"])){
											$sql = "UPDATE car SET car_tytle = ?, seating_capasity = ?, car_overview = ?, daily_price = ?  WHERE car_id = ?";
								 			$res = $db->updateRow($sql, [$carName, $carCapasity,$overview, $carPrice, $editid]);
										}else{
								 			$sql = "UPDATE car SET car_tytle = ?, seating_capasity = ?, car_overview = ?, image = ?, daily_price = ? WHERE car_id = ?";
								 			$res = $db->updateRow($sql, [$carName, $carCapasity,$overview,$new_image_name, $carPrice, $editid]);
								 			if($OldCarImg != '../car_image/default.png'){
								 				//ugrađena php funkcija unlink() briše postojeću sliku
								 				unlink($OldCarImg);
								 			}
										}


							 			echo '
							 				<div class="alert alert-success">
											  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											  <strong>Success!</strong> Edit Successfully.
											</div>
							 			';
								 	}//end if isset updatecar
						?>

					   <div class="form-group">
					    <label for="inputdefault">Car:</label>
					    <input class="form-control" id="inputdefault"  name="car_id" type="hidden" value ="<?php echo $editid; ?>">
					    <input class="form-control" id="inputdefault"  name="car_tytle" type="text" value ="<?php echo $carName; ?>">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Description:</label>
					    <input class="form-control" id="inputdefault" name="car_overview" type="text" value ="<?php echo $overview; ?>">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Car Capacity:</label><br />
					    <select name = "seating_capasity" class = "btn-lg" style = "width:250px;">
					    	<option <?php if($carCapasity == '4 Persons'){echo 'selected';} ?> value = "4 Persons">4 Persons</option>
					    	<option <?php if($carCapasity == '9 Persons'){echo 'selected';} ?> value = "9 Persons">9 Persons</option>
					    	<option <?php if($carCapasity == '6 Persons'){echo 'selected';} ?> value = "6 Persons">6 Persons</option>
					    </select>
					  </div>

					  <input type="hidden" name="oldImage" value="<?php echo $getOldCarImg; ?>">

					   <div class="form-group">
				    	  <label for="inputdefault">Car Picture:</label>
					      <input class="form-control" id="inputdefault" name="cimg" type="file">
					    </div>

					  <button class="btn btn-info" name = "updatecar">
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
<?php 
$db->Disconnect();
?>