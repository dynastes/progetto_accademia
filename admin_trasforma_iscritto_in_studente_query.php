<?php 
@include_once 'menu.php';
$idUtente=$_POST["idUtente"];
$matricolaStudente=$_POST["matricolaStudente"];

echo $idUtente;
echo $matricolaStudente;

//Id_anagrafe, Matricola, Attivo
$sqlInserisciStudente="INSERT INTO studenti (Id_anagrafe, Matricola, Attivo) VALUES('" . $idUtente . "', '" . $matricolaStudente  . "', '1')";
echo $sqlInserisciStudente;

$res=$connessione->query($sqlInserisciStudente);

if($res){
	$_SESSION["studente-inserito"]=1;
} else {
	$_SESSION["studente-inserito"]=-1;
}
@header('location:admin_trasforma_iscritto_in_studente.php');
?>
