<?php
@include_once 'dbconnection.php';

$id_settore=$_GET['ID'];
echo "Id settore: ".$id_settore; 

$sql_delete_settore="DELETE FROM settore WHERE Id='$id_settore'";
echo "<br>Query: ".$sql_delete_settore;

$sql_delete_settore_from_piano="UPDATE materie_anagrafica SET Id_settore='100' WHERE Id_settore='$id_settore'";
echo "<br>Query: ".$sql_delete_settore_from_piano;

$connessione->query($sql_delete_settore);
$connessione->query($sql_delete_settore_from_piano);

//@header('location:admin_visualizza_settori.php');

?>

