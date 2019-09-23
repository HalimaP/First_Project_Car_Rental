<!DOCTYPE html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Car Reservation</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/style.css">

	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
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
						<img src="img/carlogo.jpg" height="50" width="50"> &nbsp;
					</div>
			
					<!-- Prikupljanje navigacijske veze, obrazaca i drugih sadržaja za prebacivanje -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Times New Roman; font-size: 30px;">Car Rental</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<li class="active">
								<a href="index.php">Home</a>
							</li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right" style="font-family: Times New Roman;">
							<li>
								<a href="login.php">
									Login
									<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
								</a>
							</li>

							<li>
								<?php include_once('goToRegistration.php'); ?>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<!-- end -->
		<div class="row">
					<div class="item active">
						<img src="img/firstPage.jpeg" style="height: 500px; width:100%;margin:auto;">
						<div class="container">
							<div class="carousel-caption">
								
								
								
							</div>
						</div>
					</div>
				</div>

				

		<br />
		<div class="row container-fluid">
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><center>About Us</center></h3>
					</div>
					<div class="panel-body">
						Our company has been operating since 2010.<br> We are renting a car. We operate successfully and many people use our services on a daily basis.
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><center>Contact Us</center></h3>
					</div>
					<div class="panel-body">
						E-mail: halima.potur@gmail.com <br>
						Number Phone: 00 387 61 498 971 
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title"><center>Welcome</center></h3>
					</div>
					<div class="panel-body">
						
 For booking you need to register<br> if you are not already our user.<br> We look forward to working together.<br><br>Book your car today .

					</div>
				</div>
			</div>
		</div>
		
		
		<footer>
				<center class="center">&copy; 2019</center>
		</footer>

 		<script src="bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="bootstrap/js/jquery.dataTables.js"></script>
 		<script src="bootstrap/js/jquery.dataTables2.js"></script>
 		<script src="bootstrap/js/bootstrap.js"></script>

	</body>
</html>