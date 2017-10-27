<?php
@include_once 'dbconnection.php';
$Id=$_GET['Id'];
$sqlRemoveMateriaDocenti="DELETE FROM materia_docente
                          WHERE Id=".$Id;
$connessione->query($sqlRemoveMateriaDocenti);

@header('Location:admin_imposta_materia_docenti.php');
?>