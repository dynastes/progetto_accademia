<?php


@include_once 'shared/head_inclusions.php';
@include_once 'shared/menu_bootstrap.php';
@include_once 'dbconnection.php';

$A= $_SESSION['login'];
$sql = "SELECT * from anagrafe where ID='$A'";

$result = $connessione->query($sql);
while($row = $result->fetch_assoc()) {
	$Id=$row['Id'];
	$Nome=$row['Nome'];
	$Cognome=$row['Cognome'];
	$Username=$row['Username'];
	$Password=$row['Password'];
}


?>

 <!DOCTYPE html>

<html>
<head>
	<?php @include_once 'shared/head_inclusions.php';?> 
</head>
<body>

	
   <?php menu(); ?>
		
  <div class="container">
<form method="post" action="modifica_profilo.php">

In questa pagina puoi modificare le tue credenziali di accesso.<br>
Le tue attuali credenziali sono:</br>

<p>Nome: <input type="text" name="Nome" value="<?php echo $Nome;?>" /></p> 
<p>Cognome: <input type="text" name="Cognome" value="<?php echo $Cognome;?>" /></p> 
<p>Username: <input type="text" name="Username" value="<?php echo $Username;?> " /></p>  
<p>Password: <input type="text" name="Password" value="<?php echo $Password;?> " /></p> 
<input type="submit" value="Invia richiesta modifica profilo">
							</div>
							
</form>
<footer class="navbar-fixed-bottom">
<?php @include_once 'shared/footer.php'; ?>
</footer>	
</body>
</html>