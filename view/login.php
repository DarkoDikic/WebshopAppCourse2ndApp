<?php



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
                    <li><a href="routes.php?page=showregistraciju">Registracija</a></li>
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
                <section class="form-elements">
                    
                    <h1>Log in</h1>
                    <form action="routes.php" method="post">
                        <!--ISKOPIRATI ZA INPUT TEXT-->
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="" palceholder="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="" class="form-control">
                        </div>
  
                        <input type="submit" name="page" value="login">

                    </form>
                    <?php if(isset($msg)){
                    ?> 
                    <div class="alert alert-danger">
 						<span style="color:red;"><?php echo $msg;?></span>
					</div>
					<?php
					}
					?>
					<br>
					<br>
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
