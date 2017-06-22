<?php
@include_once 'dbconnection.php';

$id_dipartimento=$_POST['id_dipartimento'];
//$nuovo_nome_codice=$_POST['nuovo_codice'];
$nuovo_nome_dipartimento=$_POST['nuovo_nome_dipartimento'];

echo "Id dipartimento: ".$id_dipartimento; 
//echo "<br>Nuovo codice: ".$nuovo_nome_codice; 
echo "<br>Nome nuovo dipartimento: ".$nuovo_nome_dipartimento;

$sql_update_dipartimento="UPDATE dipartimenti SET Nome_dipartimento='$nuovo_nome_dipartimento' WHERE Id='$id_dipartimento'";
echo "<br>Query: ".$sql_update_dipartimento;
$update_dipartimento=$connessione->query($sql_update_dipartimento);

@header('location:admin_visualizza_dipartimenti.php');

?>

