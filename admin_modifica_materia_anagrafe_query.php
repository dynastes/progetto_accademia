<?php
@include_once 'dbconnection.php';

$id_materia=$_POST['id_materia'];
$nuovo_settore=$_POST['nuovo_settore'];
$nuovo_nome_materia=$_POST['nuovo_nome_materia'];

echo "Id materia: ".$id_materia; 
echo "<br>Nuovo settore: ".$nuovo_settore;
echo "<br>Nome nuova materia: ".$nuovo_nome_materia;

$sql_update_materia="UPDATE materie_anagrafica SET Nome_materia='$nuovo_nome_materia', Id_settore='$nuovo_settore' WHERE Id='$id_materia'";
echo "<br>Query: ".$sql_update_materia;
$update_materia=$connessione->query($sql_update_materia);

@header('location:admin_visualizza_materie_anagrafe.php');

?>

