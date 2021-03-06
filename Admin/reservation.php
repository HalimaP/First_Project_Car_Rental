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

		<!-- početak kompletno sadržaja -->
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
		
		<!-- main sadržaj -->
		
		
 <div class="container">
			
			<br />
			<br />

			
		 <br />
		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>USER</th>
					<th>CONTACT</th>
					<th>ADDRESS</th>
					<th><center>IMAGE</center></th>
					<th>CAR </th>
					<th> MESSAGE</th>
					
					<th> RESERVED</th>
					
					<th>PRICE</th>
				</thead>
				<tbody>
					<?php 
			$sql = "SELECT * FROM reservation r INNER JOIN car c ON c.car_id = r.car_id
			INNER JOIN user u ON u.user_id = r.user_id
			";
			$res = $db->getRows($sql);

			// echo print_r($res);

			foreach ($res as  $r) {

				$r_id = $r['res_id'];
				$firstName = $r['first_name'];
				
				$lastName = $r['last_name'];
				$contact = $r['contact'];
				$address = $r['adress'];
				$img = $r['image'];
				$carTytle = $r['car_tytle'];
				$message = $r['message'];
				
				$carPrice = $r['daily_price'];
				$resDate = $r['res_date'];
				

		?>
					<tr>
						<td class="align-img"><?php echo $firstName.'  '.$lastName; ?></td>
						<td class="align-img"><?php echo $contact; ?></td>
						<td class="align-img"><?php echo $address; ?></td>
						<td class="align-img"><center><img src="<?php echo $img; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo $carTytle; ?></td>
						<td class="align-img"><?php echo $message; ?></td>
						
						<td class="align-img"><?php echo $resDate; ?></td>
						
						<td class="align-img"><?php echo 'KM '.number_format($carPrice, 2); ?></td>
					</tr>
					<?php
			}//kraj foreach za prikaz rez


		?>



				</tbody>
			</table>

		 </div>

			
		<!-- main sadržaj -->

	</body>
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


		
		<!-- main sadržaj -->

	</body>
 		





</html>



<?php 
$db->Disconnect();
?>