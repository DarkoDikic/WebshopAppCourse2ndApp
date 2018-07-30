<?php

require_once '../model/DAO.php';

class Controller{
	
	public function nazad(){
		$dao=new DAO();
		$artikli=$dao->getArtikli();
		include 'artikli.php';
	}
	
	public function remove(){
		$idart=$_GET['idart'];
		
		session_start();
		if(!empty($_SESSION['korpa'])){
			foreach($_SESSION['korpa'] as $key=>$pom){//trazimo po kljucu iz niza gde se podudara
				if($pom['idart']==$idart){
					unset($_SESSION['korpa'][$key]);//unsetujemo celu sesiju
					$msg="Proizvod uspeno uklonjen iz korpe";
				}
			}
		}
		include 'korpa.php';
	}
	
	
	public function korpa(){
		$dao=new DAO;
		
		$idart=isset($_GET['idart'])?$_GET['idart']:"";
		$artikal=$dao->getArtikalById($idart);
		if($artikal){
			session_start();
			if(!isset($_SESSION['korpa'])){
				$_SESSION['korpa']=array();//ako ne postoji korpa kreiraj je
				$_SESSION['korpa'][]=$artikal;//dodavanje artikla u sesiju korpa
				$msg="Artikal dodat u korpu";
				$artikli=$dao->getArtikli();
				include 'artikli.php';
			}else{
			   $key=array_search($artikal, $_SESSION['korpa']);
			if($key===false){
		
				$_SESSION['korpa'][]=$artikal;//na vec postojecu korpu dodaj novi proizvod
				$msg="Dodali ste jos jedan artikal u korpu";
				$artikli=$dao->getArtikli();
				include 'artikli.php';
			}else{
					$msg="Taj artikal vec imate u korpi molimo Vas uvecajte kolicinu.";
			         include 'korpa.php';
			}	
				
			}
		}else{
			$msg="Pogresan id,taj artikal nemamo u bazi";
			include 'artikli.php';
		}
		
	}
	
	public function login(){
		$username=isset($_POST['username'])?$_POST['username']:"";
		$password=isset($_POST['password'])?$_POST['password']:"";
		
		if(!empty($username)&&!empty($password)){
			$dao=new DAO();
			$osoba=$dao->getUser($username, $password);
			if($osoba){
				session_start();
				$_SESSION['ulogovan']=serialize($osoba);
				$_SESSION['time']=time();
				$artikli=$dao->getArtikli();
				include 'artikli.php';
				//prosledjujemo i listu artikala na stranu
				//kako bi ih prikazali na strani artikli.php
			}else{
				$msg="Username ili password pogresni";
				include 'login.php';
			}
		}else{
			$msg="Morate popuniti sva polja.";
			include 'login.php';
		}
	}
	
	public function showregistraciju(){
		include 'registracija.php';
	}
	
	public function logout(){
		if(!isset($_SESSION)){
	    session_start();
		}

		if(isset($_SESSION['ulogovan'])){
		    $msg = "Uspesno izlogovan korisnik " . $_SESSION['username'];
		    $_SESSION['ulogovan'] = FALSE;		    
		    session_destroy();
		    header("Location:login.php");
		}
	}
	
    public function registracija(){
		$ime=isset($_POST['ime'])?$_POST['ime']:"";
		$prezime=isset($_POST['prezime'])?$_POST['prezime']:"";
		$email=isset($_POST['email'])?$_POST['email']:"";
		$username=isset($_POST['username'])?$_POST['username']:"";
		$password=isset($_POST['password'])?$_POST['password']:"";
		
		$errors=array();
			if(empty($ime)){
				$errors['ime']="Morate odabrati ime";
			        }
			if(empty($prezime)){
				$errors['prezime']="Morate uneti prezime";
					}
			if(empty($email)){
				$errors['email']="Morate uneti email";
					}else{
					if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					  
					} else {
						//moramo upucati greske da ne bi prosao email u bazu
					  $errors['email']="formast nije pravilno unet";
			}
					}
			if(empty($username)){
						$errors['username']="Morate uneti username";
							}
			if(empty($password)){
						$errors['password']="Morate uneti password";
			}else{
				if(mb_strlen($password)<=4){
					$errors['password']="Morate uneti vise od 4 karaktera";
				}
			}	
			
			
   			if(count($errors)==0){	
   				
   			$dao=new DAO();
   	
   			$status=$dao->checkUser($username,$password);
			if($status){
				$msg="usermane ili password su  postojeci";
				include 'registracija.php';
				die();
			}else{
				//provera prilikom registracije da li postoji vec korisnik u bazi sa tim userom ili pasvordom
	   				$dao->registracija($ime, $prezime, $email, $username, $password);
	   				$msg="Uspesno ste se registrovali hvala vam";
	   				include_once 'registracija.php';
			}
   			}else{
   				$msg="Morate popuniti sva polja praviljno";
   				include 'registracija.php';
   				
   			}
		
	}
	public function isprazni(){
		
		$dao=new DAO();
		$isprazni=isset($_GET['isprazni'])?$_GET['isprazni']:"";
		if(isset($isprazni)){
			session_start();
			if(isset($_SESSION['korpa'])){
				$_SESSION['korpa']=array(); // setujemo korpu na prazan niz
				
				include 'korpa.php';
			}
		}else{
			$msg="Pogresna akcija.";
				include 'artikli.php';
			
		}
	}
	
	public function uvecaj(){
		
			$idart=isset($_GET['idart'])?$_GET['idart']:"";
			$kolicina=isset($_GET['kolicina'])?$_GET['kolicina']:"";
			
		//	var_dump($idart);
		//	var_dump($kolicina);
		
			$dao = new DAO();
			$artikal = $dao->getArtikalById($idart);
			
			$uvecanakolicina=$kolicina+1;
			
			$uvecanacena=$uvecanakolicina*$artikal['cena'];
			
			include 'korpa.php';
			
			
			
		
			
	}
	
		
}