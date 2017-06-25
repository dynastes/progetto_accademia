<?php
@session_start();
@include_once 'dbconnection.php';

$nome_dipartimento=$_POST['nome_dipartimento'];

$sql_inserisci_dipartimento="INSERT INTO dipartimenti (Nome_dipartimento) VALUES ('".$nome_dipartimento."');";
	//echo "QUERY: ".$sql_inserisci_dipartimento;
	$connessione->query($sql_inserisci_dipartimento);
	
	@header('location:admin_visualizza_dipartimenti.php');

?>
