<?php
$ime=isset($ime)?$ime:"";
$prezime=isset($prezime)?$prezime:"";
$email=isset($email)?$email:"";
$username=isset($username)?$username:"";

$errors=isset($errors)?$errors:array();
$msg=isset($msg)?$msg:"";
//var_dump($msg);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>OK</title>

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
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="nav navbar-nav navbar-right text-center">
                       <!--<li><a class="active" href="#">home</a></li>--> 
                        <!--<li><a href="#">about</a></li>--> 
                        <!--<li><a href="#">services</a></li>--> 
                        <!--<li><a href="#">portfolio</a></li>--> 
                        <!--<li><a href="#">tim</a></li>--> 
                        <!--<li><a href="#">blog</a></li>--> 
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <main>
            <div class="container">
                <section class="form-elements">
                    
                    <h1>Registracija</h1>
                    
                    <form action="routes.php" method="post">
                        <div class="form-group">
                            <label>Ime:</label>
                            <input type="text" name="ime"  placeholder="Ime" value="<?php echo $ime;?>" class="form-control">
                            <span style="color:red;" class="label label-default">*<?php if(array_key_exists('ime', $errors))echo $errors['ime']?></span>
                        </div>
                        <div class="form-group">
                            <label>Prezime:</label>
                            <input type="text" name="prezime"  placeholder="prezime" value="<?php echo $prezime;?>" class="form-control">
                            <span style="color:red;" class="label label-default">*<?php if(array_key_exists('prezime', $errors))echo $errors['prezime']?></span>
                        </div>
						<div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="email"  placeholder="email" value="<?php echo $email;?>" class="form-control">
                            <span style="color:red;" class="label label-default">*<?php if(array_key_exists('email', $errors))echo $errors['email']?></span>
                        </div>
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username"  placeholder="username" value="<?php echo $username;?>" class="form-control">
                            <span style="color:red;" class="label label-default">*<?php if(array_key_exists('username', $errors))echo $errors['username']?></span>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password"  placeholder="password" value="" class="form-control">
                            <span style="color:red;" class="label label-default">*<?php if(array_key_exists('password', $errors))echo $errors['password']?></span>
                        </div>

                       
                        <input type="submit" name="page" value="registracija">

                    </form>
                    <?php if(!empty($msg)){
                    	
                    ?>
                    <div class="alert alert-danger">
 						<span style="color:red;"><?php echo $msg;?></span>
					</div>
                    	
                   	<?php
					}?>
                </section>
            </div>
        </main><!--main end-->
        
        
        
        
        
        <footer>
            <div class="container">
                <p>Obuke i kursevi</p>
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