<?php

require_once '../controller/Controller.php';

$controller = new Controller();

if($_SERVER['REQUEST_METHOD']==='POST'){
	$page=$_POST['page'];
	
	switch ($page){
		
		case'login':
			$controller->login();
		break;
		
		case 'registracija':
		$controller->registracija();
		break;
	}		
	
}else{
	$page=$_GET['page'];
	
	switch ($page){
			case'korpa':
			$controller->korpa();
		break;
		
		case'remove':
			$controller->remove();
		break;
		case'nazad':
			$controller->nazad(); 
		break;
		
		case'logout':
			$controller->logout(); 
		break;
		case 'showregistraciju':
			$controller->showregistraciju();
		break;
		case 'isprazni':
			$controller->isprazni();
		break;
		
		case '+':
			$controller->uvecaj();
		break;
		
		case 'plus':
			$controller->uvecaj();
		break;
	}
}


//uraditi sa request metod da li je post ili get i na taj nacin dobiti rute
// u slucaju da ne stize nijedna akcija tj page setovali smo defaultni naziv da bude index
//$pageGet=isset($_GET['page'])?$_GET['page']:"index";
//$pagePost=isset($_POST['page'])?$_POST['page']:"index";
//$page=($pageGet!='index')?$pageGet:$pagePost;

/*switch ($page){
	
	case 'showregistraciju':
		$controller->showregistraciju();
	break;
	case 'registracija':
		$controller->registracija();
	break;
	case 'registracija':
		$controller->registracija();
	break;
}
*/