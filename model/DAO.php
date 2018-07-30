<?php
require_once '../config/db.php';

class DAO{
	
	private $db;
	
	private $REGISTRACIJA="INSERT INTO `osoba` (`ime`, `prezime`, `email`, `username`, `password`) VALUES (?,?,?,?,?)";
	
	private $CHECK_USER="SELECT * FROM osoba WHERE username=:username OR password=:password";
	
	private $GETUSER="SELECT * FROM osoba WHERE username=? AND password=?";
	
	private $GETARTIKLI="SELECT * FROM artikal";
	
	private $GETARTIKAL_BY_ID="SELECT * FROM artikal WHERE idart=?";
	
	
	
	public function __construct(){
		
		$this->db =DB::createInstance();
		
	}
	
	
	
	public function getArtikalById($idart){
	
		$statement =$this->db->prepare($this->GETARTIKAL_BY_ID);
		$statement->bindValue(1, $idart);
		$statement->execute();
		$result=$statement->fetch();
		return $result;
		
	} 
	
	
	
	public function getArtikli(){
	
		$statement =$this->db->prepare($this->GETARTIKLI);

		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
		
	} 
	
	
	public function getUser($username,$password){
	
		$statement =$this->db->prepare($this->GETUSER);
		
		$statement->bindValue(1, $username); 
		$statement->bindValue(2, $password);
				
		$statement->execute();
		
		$result=$statement->fetch();
		return $result;
		
	} 
	
	
	
	public function registracija($ime,$prezime,$email,$username,$password){
	    	
	        $statement =$this->db->prepare($this->REGISTRACIJA);
	       
		    $statement->bindValue(1, $ime);
		    $statement->bindValue(2, $prezime);
		    $statement->bindValue(3, $email);
		    $statement->bindValue(4, $username);
			$statement->bindValue(5, $password);
			
			$statement->execute();
	     
	    	
	    }
	    
	public function checkUser($username,$password){
	    	
	    	$statement =$this->db->prepare($this->CHECK_USER);
	    	
	    	$params = array(
	            ':username' => $username,
	    		':password'=>$password
	         );
	         
			$statement->execute($params);
	
			 if($statement->rowCount()){
	    			$msgRegister="username ili password su vec uneti";
	    		return TRUE;
	         }else{
	         	return FALSE;
	         }
    }
	
	/*
	public function getLastNProizvodjaca($n){
	
		$statement =$this->db->prepare($this->GETLASTNPROIZVODJAC);
		
		$statement->bindValue(1, $n, PDO::PARAM_INT); 
				
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
		
	} 
	*/
}