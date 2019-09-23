<?php 

include_once('connection.php'); //KONEKCIJA

class Database extends connection{


	public function __construct(){
//Roditeljski konstruktor je u connection.php, klasa Connection koju nasljeđuje klasa Database!!!
		parent::__construct();
		

	}//kraj podraz. konstruktora.

	//odjava je u roditeljskoj klasi connection.php

	//get row uzima $query(bilo koji upit SELECT) i parametre kao niz
	public function getRow($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);//Priprema izjavu za izvršenje i vraća objekat izjave
			$stmt->execute($params); //izvršava pripremljenu izjavu
			return $stmt->fetch();	
		} catch (PDOException $e) {//Predstavlja grešku koju je podigao PDO.
			throw new Exception($e->getMessage());	
		}


	}//end getRow

	//get rows
	public function getRows($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();	
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());	
		}
	}//end getRows

	//insert row
	public function insertRow($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return TRUE;	
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());	
		}

	}//end insertRow

	//update row samo za izmjenu ubacivanje
	public function updateRow($query, $params = []){
		$this->insertRow($query, $params);
	}//end updateRow

	//delete row 
	public function deleteRow($query, $params = []){
		$this->insertRow($query, $params);
	}//end deleteRow

	//get the last inserted ID
	public function lastID(){
		$lastID = $this->datab->lastInsertId(); 
		return $lastID;
	}//end lastID func


	/*PDOStatement :: bindParam () i / ili PDOStatement :: bindValue () mora biti pozvan da veže varijable ili vrijednosti (respektivno) na parametre markera. Ograničene varijable prenose svoju vrijednost kao ulaz i primaju izlaznu vrijednost pridruženih markera parametara ili treba proslijediti niz vrijednosti parametara samo za ulaz*/
	public function transInsert($query, $params = [], $query2, $params2 = []){
		try {
			$this->transaction->beginTransaction();//započinje transakciju
				$stmt = $this->datab->prepare($query);
				$stmt->execute($params);

				$stmt2 = $this->datab->prepare($query2);
				$stmt2->execute($params2);

			$this->transaction->commit();
		} catch (PDOException $e) {
			$this->transaction->rollBack();
			throw new Exception($e->getMessage());	
		}
	}//end transac func
	//Isključuje način automatskog slanja Dok je isključen autocommit način, promjene u bazu podataka putem PDO objekta slučaju nisu počinili sve dok  se ne završi transakcija pozivom PDO :: commint () 
    //vraća true ili false


	public function Begin(){
		$this->transaction->beginTransaction();
	}

	public function Commit(){
		$this->transaction->commit();
	}
}


 ?>