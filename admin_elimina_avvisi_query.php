<?php
@include_once 'dbconnection.php';

$id_avviso=$_GET['ID'];
echo "Id avviso: ".$id_avviso; 

$sql_delete_avviso="DELETE FROM avvisi WHERE Id='$id_avviso'";
echo "<br>Query: ".$sql_delete_corso;

$connessione->query($sql_delete_avviso);


@header('location:docenti_visualizza_avvisi.php');

?>

