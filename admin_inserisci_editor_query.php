<?php @include_once 'shared/menu.php';
	$nomeEditor=$_POST["nome-editor"];
	$cognomeEditor=$_POST["cognome-editor"];

	//$dataNascita=$_POST["data-nascita"];
	$giornoNascita=$_POST["giorno-nascita"];
	$meseNascita=$_POST["mese-nascita"];
	$annoNascita=$_POST["anno-nascita"];
	$codiceFiscale=$_POST["codice-fiscale"];
	$email=$_POST["email"];
	$indirizzo=$_POST["indirizzo"];
	$residenza=$_POST["residenza"];
	$telefono=$_POST["telefono"];
	$password = $_POST['password'];
	$idAnagrafe=0;

	//creazione username e password
	$username=$nomeEditor[0].$nomeEditor[1].$nomeEditor[2].".".$cognomeEditor[0].$cognomeEditor[1].$cognomeEditor[2];
	$username=strtolower($username);
	$password_cript=password_hash($password,PASSWORD_BCRYPT);
	//creazione data nascita
	$dataNascita=$annoNascita."-".$meseNascita."-".$giornoNascita;

	//inserisci in ANAGRAFE [nome, cognome, data_nascita, codice_fiscale, email, Indirizzo, residenza, Telefono, Username, Password]
							//id_anagrafe, anno_accademico, matricola, diploma, id_corso


	$sqlAnagrafe="INSERT INTO anagrafe (Nome, Cognome, Data_nascita, Codice_fiscale, Email, Indirizzo, Residenza, Telefono, Username, Password)
					VALUES ('".$nomeEditor."', '".$cognomeEditor."', '".$dataNascita."', '".$codiceFiscale."', '".$email."', '".$indirizzo."', '".$residenza."', '".$telefono."', '".$username."', '".$password_cript."')";

					echo "\n";
	echo "Query: ".$sqlAnagrafe;
	$res=$connessione->query($sqlAnagrafe);
	echo "Utente inserito nella tabella ANAGRAFE.\n";


	//ricerca Id anagrafe dell'utente appena inserito
	$sqlIdAnagrafe="SELECT * FROM anagrafe WHERE Nome='".$nomeEditor."' AND Cognome='".$cognomeEditor."' AND Codice_fiscale='". $codiceFiscale ."' ORDER BY Id DESC";
	echo "\n #Inserimento dell'utente nella tabella editor (editor con id estratto da qui: ".$sqlIdAnagrafe." _____\n";
	$res=$connessione->query($sqlIdAnagrafe);
	if ($res){
		echo "\n";
		echo "(!!!) UTENTE TROVATO. Inserimento nella tabella EDITOR in corso";
	}
	$idAnagrafe=$res->fetch_assoc();
echo "\n";
echo "##ID utente da inserire tra gli editor: ".$idAnagrafe["Id"];
	$sqlEditor="INSERT INTO editor (Id_anagrafe) VALUES
					(".$idAnagrafe["Id"].")";

	$resStud=$connessione->query($sqlEditor);

	echo $sqlAnagrafe ." ________ ".$sqlEditor;




	if($res and $resStud){
		$_SESSION["editor-aggiunto"]=1;
	} else {
		$_SESSION["editor-aggiunto"]=-1;
	}
	@header('location:admin_inserisci_editor.php');
?>
