<?php
@session_start();
@include_once 'dbconnection.php';

$Id_dipartimento=$_POST['dipartimento'];
$nome_corso=$_POST['nome_corso'];
//$nome_corso=ucwords($nome_corso);
$nome_corso=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($nome_corso))));

$sql_inserisci_settore="INSERT INTO corsi (Id_dipartimento, Nome_corso, Attivo) VALUES ('".$Id_dipartimento."', '".$nome_corso."',1);";
	//echo "QUERY: ".$sql_inserisci_settore;
	$connessione->query($sql_inserisci_settore);
	
	@header('location:admin_visualizza_corsi.php');

?>
