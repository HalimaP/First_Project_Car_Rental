<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>

<?php 
include_once('../config.php');//database
  $db = new Database();

				if(isset($_GET['delid']))
					{
						$userId = $_GET['delid'];
						$sql = "UPDATE user SET user_status_id = 2 WHERE user_id = ?";
						$res = $db->deleteRow($sql,[$userId]);
						if($res){
									header('location:../register.php');}

						$firstName = $_GET['first_name'];
						if($firstName != $userId){
							echo '<div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Account Deleted Successfully.
                      </div>';
						}


						/*if(isset($_GET['delid'])){

							echo '<div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Account Deleted Successfully.
                      </div>';

						}*/
					}
			?>
</body>
</html>