<?php @include_once 'menu.php';
	$nomeStudente=$_POST["nome-studente"];
	$cognomeStudente=$_POST["cognome-studente"];

		//$dataNascita=$_POST["data-nascita"];
		$giornoNascita=$_POST["giorno-nascita"];
		$meseNascita=$_POST["mese-nascita"];
		$annoNascita=$_POST["anno-nascita"];
	$codiceFiscale=$_POST["codice-fiscale"];
	$email=$_POST["email"];
	$indirizzo=$_POST["indirizzo"];
	$residenza=$_POST["residenza"];

	$idAnagrafe=0;
	$annoAccademico=1;
	$matricolaStudente=$_POST["matricola-studente"];
	$diplomaStudente=$_POST["diploma-studente"];
	$idCorso=$_POST["corso-studente"];

	echo "Corso studente:".$idCorso." ";

	//creazione username e password
	$username=$nomeStudente[0].$nomeStudente[1].$nomeStudente[2].".".$cognomeStudente[0].$cognomeStudente[1].$cognomeStudente[2];
	$username=strtolower($username);
	$password=$username;

	//creazione data nascita
	$dataNascita=$annoNascita."-".$meseNascita."-".$giornoNascita;

	//inserisci in ANAGRAFE [nome, cognome, data_nascita, codice_fiscale, email, Indirizzo, residenza, Telefono, Username, Password]
							//id_anagrafe, anno_accademico, matricola, diploma, id_corso
	

	$sqlAnagrafe="INSERT INTO anagrafe (Nome, Cognome, Data_nascita, Codice_fiscale, Email, Indirizzo, Residenza, Telefono, Username, Password) 
					VALUES ('".$nomeStudente."', '".$cognomeStudente."', '".$dataNascita."', '".$codiceFiscale."', '".$email."', '".$indirizzo."', '".$residenza."', '".$telefono."', '".$username."', '".$password."')";


	$res=$connessione->query($sqlAnagrafe);
	echo "Utente inserito nella tabella ANAGRAFE.\n";

	//ricerca Id anagrafe dell'utente appena inserito
	$sqlIdAnagrafe="SELECT * FROM anagrafe WHERE Nome='".$nomeStudente."' AND Cognome='".$cognomeStudente."' ORDER BY Id DESC";
	echo " #Inserimento dell'utente nella tabella Studenti (studente con id estratto da qui: ".$sqlIdAnagrafe." _____\n";
	$res=$connessione->query($sqlIdAnagrafe);
	if ($res){
		echo "(!!!) UTENTE TROVATO. Inserimento nella tabella STUDENTI in corso";
	}
	$idAnagrafe=$res->fetch_assoc();

echo "##ID utente da inserire tra gli studenti: ".$idAnagrafe["Id"];
	$sqlStudenti="INSERT INTO studenti (Id_anagrafe, Anno_accademico, Matricola, Diploma, Id_corso) VALUES 
					(".$idAnagrafe["Id"].", ".$annoAccademico.", '".$matricolaStudente."', '".$diplomaStudente."', ".$idCorso.")";

	$resStud=$connessione->query($sqlStudenti);

	echo $sqlAnagrafe ." ________ ".$sqlStudenti;
	if($res and $resStud){
		$_SESSION["studente-aggiunto"]=1;
	} else {
		$_SESSION["studente-aggiunto"]=-1;
	}
	@header('location:admin_inserisci_studenti.php');
?>