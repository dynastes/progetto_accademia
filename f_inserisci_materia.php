<?php
@session_start();
@include_once 'dbconnection.php';

$id_settore=$_POST['settore'];
$nome_materia1=$_POST['nome_materia1'];
$nome_materia2=$_POST['nome_materia2'];
$nome_materia3=$_POST['nome_materia3'];
$nome_materia4=$_POST['nome_materia4'];
$nome_materia5=$_POST['nome_materia5'];
$nome_materia6=$_POST['nome_materia6'];
$nome_materia7=$_POST['nome_materia7'];
$nome_materia8=$_POST['nome_materia8'];
$nome_materia9=$_POST['nome_materia9'];
$nome_materia10=$_POST['nome_materia10'];

//$_SESSION['id_settore']=$id_settore;

$sql_inserisci_materia1="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia1."\", ".$id_settore.");";
$sql_inserisci_materia2="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia2."\", ".$id_settore.");";
$sql_inserisci_materia3="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia3."\", ".$id_settore.");";
$sql_inserisci_materia4="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia4."\", ".$id_settore.");";
$sql_inserisci_materia5="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia5."\", ".$id_settore.");";
$sql_inserisci_materia6="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia6."\", ".$id_settore.");";
$sql_inserisci_materia7="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia7."\", ".$id_settore.");";
$sql_inserisci_materia8="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia8."\", ".$id_settore.");";
$sql_inserisci_materia9="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia9."\", ".$id_settore.");";
$sql_inserisci_materia10="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (\"".$nome_materia10."\", ".$id_settore.");";

//echo $sql_inserisci_materia;
$connessione->query($sql_inserisci_materia1);
$connessione->query($sql_inserisci_materia2);
$connessione->query($sql_inserisci_materia3);
$connessione->query($sql_inserisci_materia4);
$connessione->query($sql_inserisci_materia5);
$connessione->query($sql_inserisci_materia6);
$connessione->query($sql_inserisci_materia7);
$connessione->query($sql_inserisci_materia8);
$connessione->query($sql_inserisci_materia9);
$connessione->query($sql_inserisci_materia10);

@header('location:admin_inserisci_materia_anagrafe.php');

?>