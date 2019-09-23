<?php 
include_once('../config.php');
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
         <link rel="stylesheet" type="text/css" href="../bootstrap/style.css">
	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>


	<body>

		<!-- početak kompletnog sadržaja -->
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
			
					<!-- Prikupljanje navigacijskih veza, obrazaca i drugih sadržaja za prebacivanje -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Times New Roman; font-size: 30px;">Car Reservation</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<li class="active">
								<button class="My"><a href="index.php">Home</a></button>
							</li>

							<li>
								<button class="My "><a href="myReservation.php">My Reservation</a></button>
							</li>
							<li>
								<button class="My"><a href="profile2.php">Profile</a></button>
							</li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right" style="font-family: Times New Roman;">
							<li>
								<?php include_once('../Includes/logout.php'); ?>
							</li>

						</ul>
					</div><!-- /.navbar-coll -->
				</div>
			</nav>
		<!-- end -->
	
		
 		
	<br />
	<br />
	<br />
	<br />

		<div id ="info"  ></div>
<!-- početak sadržaja -->
	<div class="container-fluid">
			
		<div class="panel panel-info">
		  <div class="panel-heading" style="font-size:20px;">List of Cars Available</div>
		  <div class="panel-body">
		  		<?php 
		  			$sql = 'SELECT * FROM car ORDER by car_tytle';
		  		 	$res = $db->getRows($sql);
		  		 	//echo print_r($res);
		  		 	if($res){
		  		 		foreach ($res as $r) {
		  		 			$car_id = $r['car_id'];
	  		 				$carName = $r['car_tytle'];
	  		 				$capasity = $r['seating_capasity'];
	  		 				$carDescription = $r['car_overview'];
	  		 				$cImage = $r['image'];
	  		 				$cPrice = $r['daily_price'];

	  		 	?>	
	  		 		<a href="#"  data-toggle="modal" data-target="#myModal<?php echo $car_id; ?>">
						<img class="img-rounded" src="<?php echo $cImage; ?>" height="200" width="200">
	  		 		</a>
 					<!-- Modal -->
						<div id="myModal<?php echo $car_id; ?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal sadržaj/content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      
						      </div>
						      <div class="modal-body">
						      	          <div class="selection">
		<div class="selection__demo">
			<div class="selection__group">
				<div class="rating">
					<input type="radio" name="rating-star" class="rating__control" id="rc1">
					<input type="radio" name="rating-star" class="rating__control" id="rc2">
					<input type="radio" name="rating-star" class="rating__control" id="rc3">
					<input type="radio" name="rating-star" class="rating__control" id="rc4">
					<input type="radio" name="rating-star" class="rating__control" id="rc5">
					<label for="rc1" class="rating__item">
						<svg class="rating__star">
							<use xlink:href="#star"></use>
						</svg>
						<span class="rating__label">1</span>
					</label>
					<label for="rc2" class="rating__item">
						<svg class="rating__star">
							<use xlink:href="#star"></use>
						</svg>
						<span class="rating__label">2</span>
					</label>
					<label for="rc3" class="rating__item">
						<svg class="rating__star">
							<use xlink:href="#star"></use>
						</svg>
						<span class="rating__label">3</span>
					</label>
					<label for="rc4" class="rating__item">
						<svg class="rating__star">
							<use xlink:href="#star"></use>
						</svg>
						<span class="rating__label">4</span>
					</label>
					<label for="rc5" class="rating__item">
						<svg class="rating__star">
							<use xlink:href="#star"></use>
						</svg>
						<span class="rating__label">5</span>
					</label> 
				</div>
			</div>
		</div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
    <symbol id="star" viewBox="0 0 26 28">
      <path d="M26 10.109c0 .281-.203.547-.406.75l-5.672 5.531 1.344 7.812c.016.109.016.203.016.313 0 .406-.187.781-.641.781a1.27 1.27 0 0 1-.625-.187L13 21.422l-7.016 3.687c-.203.109-.406.187-.625.187-.453 0-.656-.375-.656-.781 0-.109.016-.203.031-.313l1.344-7.812L.39 10.859c-.187-.203-.391-.469-.391-.75 0-.469.484-.656.875-.719l7.844-1.141 3.516-7.109c.141-.297.406-.641.766-.641s.625.344.766.641l3.516 7.109 7.844 1.141c.375.063.875.25.875.719z"/>
    </symbol>
  </svg>
						      		<div class="row">
						      			<div class="col-md-6">
						      				<img src="<?php echo $cImage; ?>" height="250" width="250">
						      			</div>
						      			<div class="col-md-6">
						      				<form>
						      					<strong>Car Name: </strong><?php echo $carName; ?><br />
							      				<strong>Capacity: </strong><?php echo $capasity; ?><br />
							      				<strong>Price: </strong><?php echo 'KM '.number_format($cPrice, 2); ?><br />
							      				<strong>Description: </strong><?php echo $carDescription; ?> <br />
							      				<strong>Message: </strong> <br />
							      				<input type = "text" id="message<?php echo $car_id; ?>" >
							      				<br />
										   		<strong>Date: </strong>&nbsp;
							      				<br /> 
										    	<input class="btn-default" id="res_date<?php echo $car_id; ?>"min="<?php echo date("Y-m-d");?>" size="30" name="res_date" type="date" autocomplete="off">
										    	<br />
										    	<strong>Time : </strong>
										    	<br />
										    	<select class="btn-default" id="r_hr">
										    		<?php 
										    			$x = 12;
										    			for($time = 1; $time <= $x; $time++){
										    		?>
										    			<option value="<?php echo $time; ?>"><?php echo $time; ?></option>
										    		<?php
										    			}//end for
										    		 ?>
										    	</select>
										    	<select class="btn-default" id="r_ampm">
										    		<option value="AM">AM</option>
										    		<option value="PM">PM</option>
										    	</select>
						      				</form>
					      				
						      			</div>
						      		</div>
						      </div>
						      <div class="modal-footer">
						      	
						        <button type="button" class="btn btn-default" data-dismiss="modal">
						        	Close
						        	<span class="glyphicon glyphicon-remove-sign"></span>
						        </button>

						        <input type="submit" value="Reserved" onclick="bogkot('<?php echo $car_id; ?>')" class="btn btn-success" data-dismiss="modal">
						      </div>

						    </div>

						  </div>
						</div>

						<!-- modal END -->
	  		 	<?php
		  		 		}//end foreach of select all cars
		  		 	}//
		  		 ?>
		  </div>
		</div>

	</div>
<!-- kraj content -->
	<script type="text/javascript">
		function boat(str){
			// alert(str);
		}
	</script>

 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/jquery.dataTables.js"></script>
 		<script src="../bootstrap/js/jquery.dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>

	</body>
</html>


<script type="text/javascript">

function bogkot(str){

	var message= $('#message'+str).val();

	var car_id = str;
	var user_id = '<?php echo $_SESSION['userID']; ?>';
	var message = $('#message'+str).val();
	var res_date = $('#res_date'+str).val();
	var hr = $('#r_hr').val();
	var ampm = $('#r_ampm').val();


	var datas = "car_id="+car_id+"&user_id="+user_id+"&message="+message+"&res_date="+res_date+"&r_hr="+hr+"&r_ampm="+ampm;

	$.ajax({
		   type: "POST",
		   url: "reservedProcess.php",
		   data: datas
		}).done(function( data ) {
		  $('#info').html(data);
		});

}



</script>