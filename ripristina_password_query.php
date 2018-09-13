<?php
@session_start();
@include_once 'dbconnection.php';
@include_once 'utente_loggato.php';
function generateRandomString($length = 20) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
$email = $_POST['email'];
$domanda = $_POST['domanda'];
$risposta = $_POST['risposta'];
// verifica se email, domanda e utente sono esatti
$sql = "SELECT * FROM anagrafe WHERE Email = '".$email."' AND Domanda = '".$domanda."'";
$risultato = $connessione->query($sql);
$res = $risultato->fetch_assoc();

if(password_verify($risposta,$res['Risposta'])){
  $_SESSION['autorizza_modifica'] = TRUE;
	$uncripted_pass = generateRandomString();

	$password = password_hash($uncripted_pass,PASSWORD_BCRYPT);
	$id = $res['Id'];
	$sql = "UPDATE anagrafe SET Password = '".$password."' WHERE Id = ".$id."";
	$res = $connessione->query($sql);
	include "phpmailer/index.php";
	echo($body);
	echo($email);
}else {
  $_SESSION['autorizza_modifica'] = 0;
  header("Location: ripristina_password.php");
}
?>
