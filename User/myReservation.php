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
		<link rel="stylesheet" type="text/css" href="../bootstrap/styleButton.css">
		 <!--pagination-->
	    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
	    <script src="../bootstrap/	js/jquery.dataTables2.js"></script>


	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }

		td.align-img {
			line-height: 3 !important;
		}
	</style>

	<body>

		<!-- begin whole content -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle grupiranje  radi boljeg prikaza mobilnih uređaja -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img src="../img/carlogo.jpg" height="50" width="50"> &nbsp;
					</div>
			
					<!--  Prikupljanje navigacijskih veza, obrazaca i drugih sadržaja za prebacivanje  -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Times New Roman; font-size: 30px;">Car Reservation</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<li>
								<button class="My"><a href="index.php">Cars</a></button>
							</li>
							<li  class="active">
								<button class ="My"><a href="myReservation.php">My Reservation</a></button>
							</li>
							<li  class="active">
								<button class ="My"><a href="profile2.php">My Profile</a></button>
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
		
		
 <div class="container">
			
			<br />
			<br />

			<?php
		// BRISANJE REZERVACIJE
			if(isset($_GET['delr_id']))
				{
					$delrid = $_GET['delr_id'];
					$user_id = $_SESSION['userID'];

					$sql = "DELETE FROM reservation WHERE user_id = ? AND res_id = ?";
					$res = $db->deleteRow($sql, [$user_id, $delrid]);

						echo '
								<div class="alert alert-success">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong>Success!</strong> Cancel Reservation Successfully.
								</div>
							';
							// header('Location: myReservation.php');
				}
		 ?>

		 <br />
		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th><center>Car Image</center></th>
					<th>Car Name</th>
					<th>Description</th>
					<th>Message</th>
					<th>Date</th>
					<th>Time</th>
					<th>Price</th>
					<th><center>ACTION</center></th>
				</thead>
				<tbody>
					<?php 
			$userId = $_SESSION['userID'];
			$sql = "SELECT * FROM reservation r INNER JOIN car c ON c.car_id = r.car_id
			INNER JOIN user u ON u.user_id = r.user_id
			WHERE u.user_id = ? ";
			$res = $db->getRows($sql, [$userId]);

			// echo print_r($res);

			foreach ($res as  $r) {

				$r_id = $r['res_id'];
				$img = $r['image'];
				$carName = $r['car_tytle'];
				$carDescription = $r['car_overview'];
				$message = $r['message'];
				$cPrice = $r['daily_price'];
				$res_date = $r['res_date'];
				$rhr = $r['r_hr'];
				$rampm = $r['r_ampm'];

				$time = $rhr.' '.$rampm;
		?>
					<tr>
						<td class="align-img"><center><img src="<?php echo $img; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo $carName; ?></td>
						<td class="align-img"><?php echo $carDescription; ?></td>
						<td class="align-img"><?php echo $message; ?></td>
						<td class="align-img"><?php echo $res_date; ?></td>
						<td class="align-img"><?php echo $time; ?></td>
						
						<td class="align-img"><?php echo 'KM '.number_format($cPrice, 2); ?></td>
						<td class="align-img">
							<a class = "btn btn-danger  btn-xs" href="myreservation.php?delr_id=<?php echo $r_id; ?>">
								Cancel
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
					<?php
			}//end foreach PETLJE ZA REZERVACIJE


		?>



				</tbody>
			</table>

		 </div>

			
		<!-- main SADRŽAJ-->
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