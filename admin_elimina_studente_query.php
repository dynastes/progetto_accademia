<?php
@include_once 'dbconnection.php';

$id_anagrafe=$_GET['ID'];
echo "Id anagrafe: ".$id_anagrafe; 

$sql_delete_anagrafe="DELETE FROM anagrafe WHERE Id='$id_anagrafe'";
echo "<br>Query: ".$sql_delete_anagrafe;

$sql_delete_studente="DELETE FROM studenti WHERE Id_anagrafe='$id_anagrafe'";
echo "<br>Query: ".$sql_delete_studente;

$connessione->query($sql_delete_anagrafe);
$connessione->query($sql_delete_studente);

@header('location:admin_visualizza_studenti.php');

?>

