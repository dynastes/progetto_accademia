<?php
@session_start();
@include_once 'dbconnection.php';
@include_once 'utente_loggato.php';
$email = $_POST['email'];
$domanda = $_POST['domanda'];
$risposta = $_POST['risposta'];
echo("Email: ".$email." Domanda: ".$domanda." risposta: ".$risposta);
// verifica se email, domanda e utente sono esatti
$sql = "SELECT * FROM anagrafe WHERE Email = '".$email."' AND Domanda = '".$domanda."'";
$risultato = $connessione->query($sql);
$res = $risultato->fetch_assoc();

echo($sql);
echo($res['Risposta']);

if(password_verify($risposta,$res['Risposta'])){
  $_SESSION['autorizza_modifica'] = TRUE;
  echo($_SESSION['autorizza_modifica']);
  header("Location: ripristina_password_next.php?id=".$res['Id']);
}else {
  $_SESSION['autorizza_modifica'] = FALSE;
  echo($_SESSION['autorizza_modifica']);
  header("Location: errore_ripristino_password.php");
}
?>
