<?php
//@session_start();
@include_once 'dbconnection.php';

$id_settore=$_POST['settore'];
$nome_materia=$_POST['nome_materia'];

//$_SESSION['id_settore']=$id_settore;

$sql_inserisci_materia="INSERT INTO materie_anagrafica (Nome_materia, Id_settore) VALUES (".$nome_materia.", '$id_settore');";
echo $sql_inserisci_materia;
$connessione->query($sql_inserisci_materia);

@header('location:admin_inserisci_materia_anagrafe.php');

?>