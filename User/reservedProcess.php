<?php 
	include_once('../config.php');
	$db = new Database();





	if(isset($_POST['car_id']))
		{

			$car_id	= $_POST['car_id'];
			$user_id	= $_POST['user_id'];
			$msg 	= $_POST['message'];
			$date 	= $_POST['res_date'];
			$hr 	= $_POST['r_hr'];
			$ampm 	= $_POST['r_ampm'];

			if(!$msg){
				echo '
					<div class="alert alert-danger">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Warning!</strong> Message is Required.
					</div>
				';
			}
			else if(!$date){
				echo '
					<div class="alert alert-danger">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Warning!</strong> Date is Required.
					</div>
				';
			}
				else
					{
						 $sql = "SELECT COUNT(res_date) as rdt FROM reservation WHERE car_id = ? AND res_date = ?";
						 $res  = $db->getRow($sql, [$car_id, $date]);
					

						if($res['rdt'] > 2)
							{
								echo '
										<div class="alert alert-danger">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Warning!</strong> Reservation of this Car is already in his Limit.
										</div>
									';

							}
						else
							{
								$sql = 'SELECT * FROM reservation WHERE car_id = ? AND res_date = ? AND r_hr = ? AND r_ampm = ?';
								$res = $db->getRows($sql, [$car_id, $date, $hr, $ampm]);
								// echo print_r($res);
								if($res)
									{
										foreach ($res as $r)
											{
												$resCarId = $r['car_id'];
												$resDate = $r['res_date'];
												$rh = $r['r_hr'];
												$rampm = $r['r_ampm'];
												
												if(($resDate == $date) AND ($rh == $hr) AND ($rampm == $ampm) AND ($resCarId == $car_id))
													{
														echo '
																<div class="alert alert-danger">
																  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																  <strong>Warning!</strong> Has been already Reserved.
																</div>
															';
													}
											}
									}
									else
										{
								
											$sql = " INSERT INTO reservation(message, r_hr, r_ampm, car_id, user_id, res_date)
											VALUES (?,?,?,?,?,?) ";
											$res = $db->insertRow($sql, [$msg, $hr, $ampm, $car_id, $user_id, $date]);

											echo '
													<div class="alert alert-success">
													  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													  <strong>Success!</strong> Reservation successful. We will contact you as soon as possible.

													</div>
												';
										}
							}
					}
		}

?>