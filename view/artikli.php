<?php
if(!isset($_SESSION['ulogovan'])){
	session_start();
}
$ulogovan=unserialize($_SESSION['ulogovan']);

if($ulogovan){
	
	//automatski logout
		if(time()- $_SESSION['time']>900){
			header("Location:routes.php?page=logout");
		}else{
			 $_SESSION['time'] = time(); 
		}
	$artikli=isset($artikli)?$artikli:array();
	$korpa=isset($_SESSION['korpa'])?$_SESSION['korpa']:array();
	//var_dump($korpa);
	//var_dump($artikli); 
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

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="nav navbar-nav navbar-right text-center">
                        <li class="cart"><a href"#"><span class="fa fa-shopping-cart"></span><span class="number-products"><?php echo count($korpa);?></span></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <main>
            
            
            <div class="container">
                
                                
                <section class="shoping-cart">
                    <table class="table-hover" style="background-color:#e6ffff;">
                    	<thead>
                    		<th>Naziv</th>
                    		<th>Cena</th>
                    		<th>Kolicina</th>
                    		<th>Ukupno</th>
                    	</thead>
                        <tbody>
                        <?php 
								$suma=0;//pocetno stanje sume
								foreach ($korpa as $pom){
						?>
                            <tr>
                                <td class="product-title"><?php echo $pom['naziv'];?></td>
                                <td class="product-price"><?php echo $pom['cena'];?></td>
                                <td class="product-quantity"><?php echo $kolicina=1;?></td>
                                <td><?php echo $ukupno=$pom['cena']*$kolicina;?></td>
                            </tr>
                        <?php 	
									//suma racuna zbirnu cenu svih artikala u korpi
									
								$suma=$suma+$ukupno;	
								}
						?>  
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">UKUPNO: <span><?php echo $suma; ?></span> <span class="glyphicon glyphicon-eur"></td>
                                <td colspan="3"><a class="checkout" href="korpa.php">Pogeldaj korpu</a></td>
                            </tr>
                        </tfoot>
                    </table>
                    
                </section><!-- End of cart -->
                
                <h1>Dobro dosli</h1>

                <div class="alert alert-success" role="alert">Uspesno ste ulogovani sa username : <?php echo $ulogovan['ime'];?></div> 
                <div class="text-center">
                
                </div>   
                
                <h1>Artikli</h1> 
                <section class="include-table">
                    <div class="table-responsive">
                        <table class="table  table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Naziv</th>
                                    <th>Cena</th>
                                    <th>Kupi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php foreach ($artikli as $pom){?>
								<tr>
									<td><?php echo $pom['idart']?></td>
									<td><?php echo $pom['naziv']?></td>
									<td><?php echo $pom['cena']?></td>
									<th><a href="routes.php?page=korpa&idart=<?php echo $pom['idart']?>">Dodaj u korpu</a></th>
							
								</tr>
	
	
							<?php 
							}	
							?>
                            </tbody>
                        </table> 
                        <?php if(isset($msg)){
                        ?>
						<div class="alert alert-success" role="alert"><?php echo $msg;?></div>	
						<?php	
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