<?php
@include_once 'dbconnection.php';

$id_anagrafe=$_GET['ID'];
echo "Id anagrafe: ".$id_anagrafe; 

$sql_delete_anagrafe="DELETE FROM anagrafe WHERE Id='$id_anagrafe'";
echo "<br>Query: ".$sql_delete_docente;

$sql_delete_docente="DELETE FROM docenti WHERE Id_anagrafe='$id_anagrafe'";
echo "<br>Query: ".$sql_delete_docente;

$connessione->query($sql_delete_anagrafe);
$connessione->query($sql_delete_docente);

@header('location:admin_visualizza_docenti.php');

?>

