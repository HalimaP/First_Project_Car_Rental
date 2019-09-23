<?php 

	include_once('../config.php');//database
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
         <!--My CSS-->
         <link rel="stylesheet" type="text/css" href="../bootstrap/styleButton.css">
		 <!--pagination-->
	    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css">
	     <link rel="stylesheet" type="text/css" href="../bootstrap/style.css"><!--searh box positioning-->
	    <script src="../bootstrap/js/jquery.dataTables2.js"></script>


	</head>

	<style type="text/css">
		
	</style>

	<body>

		<!-- POČETAK KOMPLETNOG SADRŽAJA -->
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
								<button class="My"><a href="reservation.php"> Reservations</a></button>
								
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
		<br />
		<br />
		<br />
		
		<!-- main SADRŽAJ -->
		<?php 
				//ZA BRISANJE AUTOMOBILA
				if(isset($_GET['delid']))
					{
						$carId = $_GET['delid'];
						$sql = "UPDATE car SET car_status_id = 2 WHERE car_id = ?";
						$res = $db->deleteRow($sql,[$carId]);

						$carImg = $_GET['image'];
						if($carImg != '../car_image/'.'default.png'){
							unlink($carImg);
						}
						//header('Location: index.php'$carImg.'.jpg'
					}
			?>


		 <div class="container">
			<a href="newCar.php" class="btn btn-success">
				New
				<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
			</a>
			<br />
			<br />

		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>CAR</th>
					<th> CAPACITY</th>
					<th>DESCRIPTION</th>
					<th><center>CAR IMAGE</center></th>
					<th>PRICE</th>
					<th><center>ACTION</center></th>
					
				</thead>
				<tbody>
					<?php 

						$sql = "SELECT * FROM car ORDER BY updation_date";
						$res = $db->getRows($sql);
						foreach ($res as $row) {
							$carId = $row['car_id'];
							$carName = $row['car_tytle'];
							$capasity = $row['seating_capasity'];
							$overview = $row['car_overview'];
							$carImg = $row['image'];
							$carPrice = $row['daily_price'];
						

					?>
					<tr>
						<td class="align-img"><?php echo $carName; ?></td>
						<td class="align-img"><?php echo $capasity; ?></td>
						<td class="align-img"><?php echo $overview; ?></td>
						<td class="align-img"><center><img src="<?php echo $carImg; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo 'KM '.number_format($carPrice, 2); ?></td>
						<td class="align-img">
							<a class = "btn btn-success btn-xs" href="carUpdate.php?editid=<?php echo $carId; ?>">
								Edit
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a class = "btn btn-danger  btn-xs" href="index.php?delid=<?php echo $carId; ?>&image=<?php echo $carImg; ?>">
								Delete
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
						</td>
						
			
		</td>
					</tr>
					<?php } ?>

				</tbody>
			</table>

		 </div>

			
		<!-- MAIN SADRŽAJ -->
<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/jquery.dataTables.js"></script>
 		<script src="../bootstrap/js/jquery.dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>
 		    <!--pagination-->
    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>


    <script>
//script for pagination
$(document).ready(function(){
    $('#myTable').dataTable();
});
    </script>
	</body>
 		


</html>



<?php 
$db->Disconnect();
?>