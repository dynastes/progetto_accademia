<?php
@include_once 'dbconnection.php';

$id_dipartimento=$_GET['ID'];
echo "Id dipartimento: ".$id_dipartimento; 

$sql_delete_dipartimento="DELETE FROM dipartimenti WHERE Id='$id_dipartimento'";
echo "<br>Query: ".$sql_delete_dipartimento;

$sql_delete_dipartimento_from_offerta_formativa="UPDATE offerta_formativa SET Id_dipartimento='100' WHERE Id_dipartimento='$id_dipartimento'";
echo "<br>Query: ".$sql_delete_dipartimento_from_offerta_formativa;

$sql_delete_dipartimento_from_corsi="UPDATE corsi SET Id_dipartimento='1' WHERE Id_dipartimento='$id_dipartimento'";
echo "<br>Query: ".$sql_delete_dipartimento_from_corsi;

$connessione->query($sql_delete_dipartimento);
$connessione->query($sql_delete_dipartimento_from_offerta_formativa);
$connessione->query($sql_delete_dipartimento_from_corsi);

@header('location:admin_visualizza_dipartimenti.php');

?>

