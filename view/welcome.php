<html>
<head>

</head>
<body>
<h1>Dobro dosli</h1>

<a href="routes.php?page=showregistraciju">Registracija</a>
<br>
<br>

<?php if(isset($msg)){?>
      <span style="color:red;">*<?php echo $msg; ?></span>
<?php }?>
</body>


</html>



