<?php
if(!isset($_SESSION['ulogovan'])){
	session_start();
}
$ulogovan=unserialize($_SESSION['ulogovan']);

if($ulogovan){
	if(time()- $_SESSION['time']>900){
		header("Location:routes.php?page=logout");
	}else{
		 $_SESSION['time'] = time(); 
	}
	
	/////////////////////////////////////////////////
	// drugi nacin unistavanja sesije posle 15 min 
	/*$inactive=900;
	$_SESSION['loginTime']=time();
	
	if(isset($_SESSION['loginTime'])){
		$session_life=time()-$_SESSION['loginTime'];
		
		if($session_life>$inactive){
			session_destroy();
			header("Location:login.php");
		}
	} */
	
	////////////////////////////////////////////////
	//$artikli=isset($artikli)?$artikli:array();
	$korpa=isset($_SESSION['korpa'])?$_SESSION['korpa']:array();
	

	//var_dump($idart);
	//var_dump($artikli); 
	
	// podatke koje salje metoda uvecaj
	$uvecanakolicina= isset($uvecanakolicina)?$uvecanakolicina:"";
	$uvecanacena= isset($uvecanacena)?$uvecanacena:"";
	$idart=isset($idart)?$idart:"";
	
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Obuke i kursevi</title>

        <!-- Bootstrap -->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Leckerli+One|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/common.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="top">

        <header>
            <div class="header-top text-center">
                <div class="container">
                    <ul class="sign-in list-inline">
                    	<?php if($ulogovan){?>
                    	 <li><a class="btn btn-warning" href="routes.php?page=logout">Logout</a></li>
                    	 <?php 
                    	 }else{
                    	 ?>
                    	 <li><a href="#">Login</a></li>
                    	 <?php	
                    	 }
                    	?>
                    </ul>
                </div>
            </div>
            
            
        </header>
        <nav class="navbar navbar-default text-uppercase" style="background-color: #e1e1e1;">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/2000px-Webysther_20160423_-_Elephpant.svg.png" alt="WEB SCHOOL" class="img-responsive">
                    </a>
                </div>
        </nav>
        <main>
            
            <div class="container">
                <div class="alert alert-success" role="alert">Uspesno ste ulogovani sa username : <?php echo $ulogovan['ime'];?></div> 
                               
                <h1>Korpa: <i class="fa fa-money" style="font-size:54px;color:green"></i> <i class="fa fa-cc-visa" style="font-size:48px;color:red"></i> <i class="fa fa-cc-paypal" style="font-size:48px;color:red"></i> <i class="fa fa-cc-amex" style="font-size:48px;color:red"></i></h1>
                
                <section class="include-table">
                    <div class="table-responsive">
                    <?php if(empty($korpa)){
                    ?>
                    <div class="alert alert-danger" role="alert">Korpa je prazna</div>	
                    <?php 
                    }else{	
                    	?>
                        <table class="table  table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Naziv</th>
                                    <th>Cena</th>
                                    <th>Kolicina</th>
                                    <th>Iznos</th>
                                    <th>Obrisi iz korpe</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
								$suma=0;//pocetno stanje sume
									foreach ($korpa as $pom){
								?>
								<form action="routes.php" method="get">
									<tr>
									<th><?php echo $pom['idart']?></th>	
									<th><?php echo $pom['naziv']?></th>
									<th><?php echo $pom['cena']?></th>
									<!--  $kolicina mora da postoji -->
									<th>
									<input type="number" name="kolicina" value="<?php 
									if(!empty($uvecanakolicina)&&  $pom['idart']==$idart){
									echo $uvecanakolicina;
									}else{
									echo $kolicina=1;
									}
									?>" style="width:4em; margin:auto;" readonly="readonly"><br><br>
									
									<input type="hidden" name="idart" value="<?php echo $pom['idart'];
									
								
									?>">
									<!--  <a href="routes.php?page=plus&idart=<?php echo $pom['idart']?>">Dodaj</a>  -->
									
									<input type="submit" name="page" value="+" style="margin:auto;">
								</form>
									</th>
									<th><?php 
									if(!empty($uvecanakolicina)&& $pom['idart']==$idart){
										echo $ukupno=$pom['cena']*$uvecanakolicina;
									}else{
									echo $ukupno=$pom['cena']*$kolicina;
									}
									
									
									?></th>
									<th><a href="routes.php?page=remove&idart=<?php echo $pom['idart']?>">Obrisi</th>
									</tr>
									
								<?php 	
									//suma racuna zbirnu cenu svih artikala u korpi
									
									$suma=$suma+$ukupno;	
									}
								?>
									<tr>
									<td style="color:green;" colspan="6">Vas racun je : <?php echo $suma ; ?> <span class="glyphicon glyphicon-eur"></td>
									</tr>
								
                            </tbody>
                        </table> 
                        <?php }?>
                        <a class="btn btn-info" role="button" href="routes.php?page=nazad">Nastavi kupovinu</a>
                   
                        <a class="btn btn-danger" style="float:right;" role="button" href="routes.php?page=isprazni">Isprazni korpu</a><br><br>
                        <?php if(isset($msg)){
                        if(!empty($korpa)){	
                        ?>
                        <div class="alert alert-success" role="alert"><?php echo $msg;?></div>
						
						<?php	
						 }
                        }
						?> 
                    </div>
                </section>

            </div>
        </main><!--main end-->
        
        <footer>
            <div class="container">
                <p>Obuke i kursevi vezba</p>
                <a href="#top"><span class="fa fa-chevron-circle-up"></span></a>
            </div>
            
            <!--JAVASCRIPT FILE-->
            
            
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            <script src="js/main.js" type="text/javascript"></script>
        </footer><!--footer end-->
    </body>
</html>
<?php }else{
	header("Location:login.php");
}?>
