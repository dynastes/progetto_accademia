<?php
@include_once 'dbconnection.php';

$id_materia=$_GET['ID'];
echo "Id materia: ".$id_materia; 

$sql_delete_materia_from_anagrafe="DELETE FROM materie_anagrafica WHERE Id='$id_materia'";
echo "<br>Query: ".$sql_delete_materia_from_anagrafe;

$sql_delete_materia_from_piano="DELETE FROM materie_piano WHERE Id_materia='$id_materia'";
echo "<br>Query: ".$sql_delete_materia_from_piano;

$connessione->query($sql_update_materia);
$connessione->query($sql_update_materia);

@header('location:admin_visualizza_materie_anagrafe.php');

?>

