<?php
@include_once 'menu_bootstrap.php';

$Id=$_SESSION['login'];
$Nome=$_POST['Nome'];
$Cognome=$_POST['Cognome'];
$Username=$_POST['Username'];
$Password=$_POST['Password'];

echo $Id;
echo $Nome;
echo $Cognome;
echo $Username;
echo $Password;
echo "---------------";

$sqlInserisciRichiesta="UPDATE anagrafe SET Nome = '$Nome', Cognome = '$Cognome',Username = '$Username',Password ='$Password' WHERE Id='$Id'";						
$connessione->query($sqlInserisciRichiesta);					
						
						
echo $sqlInserisciRichiesta;

@header('location:profilo_bootstrap.php');

?>

