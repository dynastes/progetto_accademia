<?php
@include_once 'dbconnection.php';

$id_corso=$_GET['ID'];
echo "Id corso: ".$id_corso; 

$sql_delete_corso="DELETE FROM corsi WHERE Id='$id_corso'";
echo "<br>Query: ".$sql_delete_corso;

$sql_delete_corso_from_piano="DELETE FROM materie_piano WHERE Id_corso='$id_corso'";
echo "<br>Query: ".$sql_delete_corso_from_piano;

$connessione->query($sql_delete_corso);
$connessione->query($sql_delete_corso_from_piano);

@header('location:admin_visualizza_corsi.php');

?>

