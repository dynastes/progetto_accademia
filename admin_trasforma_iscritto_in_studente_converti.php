<?php @include_once 'menu.php';

/*
Inserire l'ID dell'utente nella tabella "studenti". Ecco la struttura della tabella studenti:
	- Id
	- Id_anagrafe
	- Matricola (DEVE ESSERE UN NUMERO SEQUENZIALE, prendendo l'ultimo numero MATRICOLA inserito nel DB)
	- Attivo (gestisce se lo studente è ancora in corso o no) [TINYINT]
*/
$idUtente=$_GET["id"];
$matricolaUtente=$_GET["matricola"];

$sqlInserisciStudente="INSERT INTO studenti (Id_anagrafe, Matricola, Attivo)
																		VALUES (".$idUtente.", ".$matricola.", 1);";

$res=$connessione->query($sqlInserisciStudente);

if($res){
	$_SESSION["studente-inserito"]=1;
} else {
	$_SESSION["studente-inserito"]=-1;
}
@header('location:admin_trasforma_iscritto_in_studente.php');
?>
