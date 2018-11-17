<?php
@session_start();
@include_once 'dbconnection.php';
@include_once 'utente_loggato.php';
$utente=$_SESSION['ut'];
$utente=unserialize($utente);

$password_temporanea = $_POST['password_temporanea'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
$id = $_POST['id'];

$sql=("SELECT * FROM anagrafe WHERE Id = '".$id."'");
$ris = $connessione->query($sql);
$res = $ris->fetch_assoc();
if(password_verify($password_temporanea,$res['Password'])) {
  $sql = "UPDATE anagrafe SET Password = '".$password."', Modp = 0 WHERE Id = ".$id."";
  $res = $connessione->query($sql);
  echo($sql);
  // verifica se email, domanda e utente sono esatti
  unset($_SESSION['autorizza_modifica']);
  $utente->set_modP(0);
  $utente=serialize($utente);
  $_SESSION['ut'] = $utente;
  $_SESSION['password_modificata'] = true;
  Header("Location: index.php");

}
else {
    $_SESSION['autorizza_modifica'] = false;
    Header("Location: ripristina_password_next.php");
}


?>
