<?php
@session_start();
@include_once 'dbconnection.php';
@include_once 'utente_loggato.php';
//richiediamo la liberria per il rechapta
@include_once "recaptchalib.php";

// your secret key
$secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

 if ($response != null && $response->success) {
		echo "entrata....";
		$nomeProfessore=$_POST['nome'];
		$cognomeProfessore=$_POST['cognome'];
			//$dataNascita=$_POST['data_nascita'];
			$giornoNascita=$_POST["giorno-nascita"];
			$meseNascita=$_POST["mese-nascita"];
			$annoNascita=$_POST["anno-nascita"];
		$email=$_POST['email'];
		$cf=$_POST['cf'];
		$indirizzo=$_POST['indirizzo'];
		$residenza=$_POST['residenza'];
		$telefono=$_POST['telefono'];
		//PASSIAMO IN HASH LA PASSWORD
		$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
				$domanda=$_POST['domanda'];
			$risposta=password_hash($_POST['risposta'],PASSWORD_BCRYPT);
		echo "salvataggio POST effettuato";


		$username=$nomeProfessore[0].$nomeProfessore[1].$nomeProfessore[2].".".$cognomeProfessore[0].$cognomeProfessore[1].$cognomeProfessore[2];
		$username=strtolower($username);

		//creazione data nascita
			$dataNascita=$annoNascita."-".$meseNascita."-".$giornoNascita;


		//inserimento nella tabella ANAGRAFE
			$sqlIscrizione="INSERT INTO anagrafe (Nome, Cognome, Data_nascita, Email, Codice_fiscale, Indirizzo, Residenza, Telefono, Username, Password,Domanda,Risposta) VALUES
						('$nomeProfessore', '$cognomeProfessore', '$dataNascita', '$email', '$cf', '$indirizzo', '$residenza', '$telefono', '$username', '$password','$domanda','$risposta')";
			echo $sqlIscrizione;
		$resIscrizione=$connessione->query($sqlIscrizione);



		//inserimento query nella tabella Professori con matricola=0
			//ricerco l'ID anagrafe per prima
			$sqlIdAnagrafe="SELECT * FROM anagrafe WHERE Nome='".$nomeProfessore."' AND Cognome='".$cognomeProfessore."' ORDER BY Id DESC";
			$res=$connessione->query($sqlIdAnagrafe);

			if ($res){
				echo "(!!!) UTENTE TROVATO. Inserimento nella tabella docenti in corso";
			}
			$idAnagrafe=$res->fetch_assoc();

				$sqlProfessori="INSERT INTO docenti (Id_anagrafe) VALUES (".$idAnagrafe['Id'].")";
			echo "<br />".$sqlProfessori;
			$resStud=$connessione->query($sqlProfessori);


		if($resStud and $resIscrizione){
			$_SESSION["iscritto-aggiunto"]=1;
		} else {
			$_SESSION["iscritto-aggiunto"]=-1;
		}
		//set POST variables
		$url = 'http://localhost/progetto_accademia/index.php';
		$fields = array(
		                        'usermail' => urlencode($email),
		                        'password' => urlencode($password)
		                );

		//url-ify the data for the POST
		$fields_string = "";
		foreach($fields as $key=>$value)
		{
			$fields_string .= $key.'='.$value.'&';
		}
		rtrim($fields_string, '&');

		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

		//execute post
		//$result = curl_exec($ch);

		//close connection
		curl_close($ch);



	}else {
		echo("chapta non valido");
		echo("<br /><a href='admin_registra_professori.php'>Torna indietro</a>");
	}
@header('location:index.php');
?>
