<?php
@include_once 'dbconnection.php';

$id_settore=$_POST['id_settore'];
$nuovo_nome_codice=$_POST['nuovo_codice'];
$nuovo_nome_settore=$_POST['nuovo_nome_settore'];
$nuovo_nome_settore=addslashes($nuovo_nome_settore);//Returns a string with backslashes before characters that need to be escaped. 
													//These characters are single quote ('), double quote ("), backslash (\) and NUL (the NULL byte).

echo "Id settore: ".$id_settore; 
echo "<br>Nuovo codice: ".$nuovo_nome_codice; 
echo "<br>Nome nuovo settore: ".$nuovo_nome_settore;

$sql_update_settore="UPDATE settore SET Codice='$nuovo_nome_codice', Settore='$nuovo_nome_settore' WHERE Id='$id_settore'";
echo "<br>Query: ".$sql_update_settore;
$update_settore=$connessione->query($sql_update_settore);

@header('location:admin_visualizza_settori.php');

?>

