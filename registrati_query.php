<?php
@session_start();
@include_once 'dbconnection.php';
@include_once 'utente_loggato.php';

echo "entrata....";
$nomeStudente=$_POST['nome'];
$cognomeStudente=$_POST['cognome'];
	//$dataNascita=$_POST['data_nascita'];
	$giornoNascita=$_POST["giorno-nascita"];
	$meseNascita=$_POST["mese-nascita"];
	$annoNascita=$_POST["anno-nascita"];
$email=$_POST['email'];
$cf=$_POST['cf'];
$indirizzo=$_POST['indirizzo'];
$residenza=$_POST['residenza'];
$telefono=$_POST['telefono'];
$password=$_POST['password'];
echo "salvataggio POST effettuato";


$username=$nomeStudente[0].$nomeStudente[1].$nomeStudente[2].".".$cognomeStudente[0].$cognomeStudente[1].$cognomeStudente[2];
$username=strtolower($username);

//creazione data nascita
	$dataNascita=$annoNascita."-".$meseNascita."-".$giornoNascita;


//inserimento nella tabella ANAGRAFE
	$sqlIscrizione="INSERT INTO anagrafe (Nome, Cognome, Data_nascita, Email, Codice_fiscale, Indirizzo, Residenza, Telefono, Username, Password) VALUES 
				('$nomeStudente', '$cognomeStudente', '$dataNascita', '$email', '$cf', '$indirizzo', '$residenza', '$telefono', '$username', '$password')";
	echo $sqlIscrizione;
$resIscrizione=$connessione->query($sqlIscrizione);



//inserimento query nella tabella STUDENTI con matricola=0
	//ricerco l'ID anagrafe per prima
	$sqlIdAnagrafe="SELECT * FROM anagrafe WHERE Nome='".$nomeStudente."' AND Cognome='".$cognomeStudente."' ORDER BY Id DESC";
	$res=$connessione->query($sqlIdAnagrafe);
	
	if ($res){
		echo "(!!!) UTENTE TROVATO. Inserimento nella tabella STUDENTI in corso";
	}
	$idAnagrafe=$res->fetch_assoc();

	$sqlStudenti="INSERT INTO studenti (Id_anagrafe, Anno_accademico, Matricola, Diploma, Id_corso) VALUES (".$idAnagrafe['Id'].", 0, 0, '', 0)";
	echo $sqlStudenti;
	$resStud=$connessione->query($sqlStudenti);


if($resStud and $resIscrizione){
	$_SESSION["iscritto-aggiunto"]=1;
} else {
	$_SESSION["iscritto-aggiunto"]=-1;
}
@header('location:registrati.php');
?>
