<?php 
include_once('config.php');

session_destroy(); //PONIŠTAVANJE SESIJE

header("location: ../First_Project_Car_Rental/index.php");

 ?>