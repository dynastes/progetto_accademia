<?php
@session_start();
@include_once 'dbconnection.php';
@include_once 'utente_loggato.php';
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
$id = $_POST['id'];
$sql = "UPDATE anagrafe SET Password = '".$password."' WHERE Id = ".$id."";
$res = $connessione->query($sql);
echo($sql);
// verifica se email, domanda e utente sono esatti
$_SESSION['autorizza_modifica'] = false;
Header("Location: index.php");
?>
