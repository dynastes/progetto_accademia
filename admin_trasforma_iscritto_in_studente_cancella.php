<?php @include_once 'menu.php'; 
$idStudente=$_GET["Id"];

//la seguente query cancella solo l'iscritto dalla tabella studenti, non dalla tabella anagrafe
$sqlCancellaIscritto="DELETE FROM studenti  WHERE Id_anagrafe=".$idStudente;
$res=$connessione->query($sqlCancellaIscritto);
//echo $idStudente."; query= ".$sqlCancellaIscritto;
$_SESSION['cancellazione-iscritto']=1;
@header('location:admin_trasforma_iscritto_in_studente.php');

?>

