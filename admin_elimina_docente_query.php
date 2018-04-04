<?php
@include_once 'dbconnection.php';

$id_docente=$_GET['ID'];
echo "Id docente: ".$id_docente; 

$sql_delete_docente="DELETE FROM anagrafe WHERE Id='$id_docente'";
echo "<br>Query: ".$sql_delete_docente;

$connessione->query($sql_delete_docente);

@header('location:admin_visualizza_docenti.php');

?>

