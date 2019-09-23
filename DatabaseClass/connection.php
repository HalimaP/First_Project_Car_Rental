<?php 
class Connection{

	protected $isConn;
	protected $datab;
	protected $transaction;

	//KONEKCIJA NA BAZU KORISTEĆI "PODRAZUMIJEVAJUĆI" KONSTRUKTOR
	public function __construct($username="root", $password="", $host="localhost", $dbname="car_rental_company", $options = []){
		
		$this->isConn = TRUE;
		try{
			$this->datab = new PDO("mysql:host={$host};  dbname={$dbname}; charset=utf8", $username, $password, $options);
			$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->transaction = $this->datab;
			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			//echo 'Connected Successfully!!!';

		}catch(PDOException $e){
			throw new Exception($e->getMessage());			
		}

	}//kraj podraz. konstr.
 

	//ODJAVA SA BAZE
	public function Disconnect(){
		$this->datab = NULL;//ZATVARANJE KONEKCIJE U PDO(php data objects)
		$this->isConn = FALSE;
	}//kraj Disconnect
}//završetak  Database
	


 //$con = new Connection();

 ?>