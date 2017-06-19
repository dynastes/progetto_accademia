<?php
@include_once 'dbconnection.php';

$id_settore=$_POST['id_settore'];
$nuovo_nome_codice=$_POST['nuovo_codice'];
$nuovo_nome_settore=$_POST['nuovo_nome_settore'];

echo "Id settore: ".$id_settore; 
echo "<br>Nuovo codice: ".$nuovo_nome_codice; 
echo "<br>Nome nuovo settore: ".$nuovo_nome_settore;

$sql_update_settore="UPDATE settore SET Codice='$nuovo_nome_codice', Settore='$nuovo_nome_settore' WHERE Id='$id_settore'";
echo "<br>Query: ".$sql_update_settore;
$update_settore=$connessione->query($sql_update_settore);

@header('location:admin_visualizza_settori.php');

?>

