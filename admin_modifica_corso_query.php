<?php
@include_once 'dbconnection.php';

$id_corso=$_POST['id_corso'];
$nuovo_dipartimento=$_POST['nuovo_dipartimento'];
$nuovo_nome_corso=$_POST['nuovo_nome_corso'];
$nuovo_nome_corso=addslashes($nuovo_nome_corso);//Returns a string with backslashes before characters that need to be escaped. 
													//These characters are single quote ('), double quote ("), backslash (\) and NUL (the NULL byte).

echo "Id corso: ".$id_corso; 
echo "<br>Nuovo dipartimento: ".$nuovo_dipartimento;
echo "<br>Nome nuova corso: ".$nuovo_nome_corso;

$sql_update_corso="UPDATE corsi SET Nome_corso='$nuovo_nome_corso', Id_dipartimento='$nuovo_dipartimento' WHERE Id='$id_corso'";
echo "<br>Query: ".$sql_update_corso;
$update_corso=$connessione->query($sql_update_corso);

@header('location:admin_visualizza_corsi.php');

?>

