<?php
@include_once 'dbconnection.php';

$id_offerta=$_GET['ID'];
echo "Id offerta: ".$id_offerta; 

$sql_delete_offerta="DELETE FROM offerta_formativa WHERE Id='$id_offerta'";
echo "<br>Query: ".$sql_delete_offerta;

$connessione->query($sql_delete_offerta);

@header('location:admin_visualizza_offerta_formativa.php');

?>

