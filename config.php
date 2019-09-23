<?php 

if(session_status() == PHP_SESSION_NONE)//verzije starije od php 5.5 ne podržavaju PHP_SESSION_NONEako su sesije omogućene, ali ne postoje.
{
	session_start();//pokreni sesiju ako već nije pokrenuta
}//kraj if uslova

require_once('DatabaseClass/Database.class.php');//Baza

 ?>