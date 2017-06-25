<?php
@session_start();
@include_once 'dbconnection.php';

$codice_settore=$_POST['codice_settore'];
$nome_settore=$_POST['nome_settore'];

$sql_inserisci_settore="INSERT INTO settore (Codice, Settore) VALUES ('".$codice_settore."', '".$nome_settore."');";
	//echo "QUERY: ".$sql_inserisci_settore;
	$connessione->query($sql_inserisci_settore);
	
	@header('location:admin_visualizza_settori.php');

?>
