<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';
if(!isset($_SESSION['lingua'])){
	$_SESSION['lingua'] = "it";
}
//@include_once 'menu.php';
/*Verifico che la sessione sia disponibile. Se lo è, vuol dire che l'utente si è già loggato e quindi che possiede già un OGGETTO UTENTE da serializzare*/
$password_verificata= false;
if(isset($_SESSION['login'])){
	if(isset($_SESSION['ut'])){
		$utente=$_SESSION['ut'];
		$utente=unserialize($utente);
		/*se si è qui, l'utente era già loggato. Mostrare chi è*/
		//echo "!!!!! Utente già loggato in precedenza. E' uno ".$utente->ruolo;
		//se l'utente era già collegato, sarà possibile reindirizzarlo alla sua home page appena cerca di ritornare al log in
		if($utente->ruolo==="studente"){
			@header("location:dashboard.php");
		} else if ($utente->ruolo==="docente"){
			@header("location:dashboard.php");
		} else if ($utente->ruolo==="admin"){
			@header("location:dashboard.php");
		}
	}
}
$risultato="";
$ruoloUtente="";//serve per poter prelevare da utente->ruolo il ruolo dell'utente e poterlo reinirizzare nella homepage corretta
//inizio controllo per il login:
if(isset($_POST['usermail'])){
	//echo "email SETTATA";
	$language=$_POST['lingua'];
	$_SESSION['lingua'] = $language;
	$usermail=$_POST['usermail'];
	$password=$_POST['password'];
	$loginString="SELECT * FROM anagrafe WHERE Email=\"" . $usermail . "\"";
	//echo "### Il login è: ".$loginString." ###\n";
	$risultato=$connessione->query($loginString);
	//verifichiamo se la password inserita corrisponde all'hash memorizzato nel campo pasword della tabella anagrafe del dabatabase
	$res=$risultato->fetch_assoc();
		if(password_verify($password,$res['Password']))
		{
			$password_verificata=true;
		}
	//chiudiamo la prima query svolta per la selezione dell'utente
	$risultato->close();
	//riapriamo una query per le prossime operazioni (trovare il tipo utente)
	$risultato=$connessione->query($loginString);
}
if(empty($risultato)){
	//ciao
	$_SESSION['login'] = false;
	$password_verificata=true;
}
elseif($risultato->num_rows==1 && $password_verificata == true){ //se vi è un valore corrispondente nel database, allora esegui qui giù
	//echo "Login In Corso............";
	if(isset($_SESSION['login'])){ //se la variabile di SESSIONE non è stata creata, salterà questo passaggio. Se c'è, ne aggiunge il valore "login=true"
		//echo "Creazione SESSIONE:......";
		$res=$risultato->fetch_assoc(); //mette i risultati in un array
		//echo "Risultato= " . $res["Nome"];
		$_SESSION['login'] = true;
		//popolo l'oggetto UTENTE
		$utente = new utenteLoggato();
		$utente->set_parameter($res["Id"],$res["Nome"],$res["Cognome"],$res["Data_nascita"],$res["Codice_fiscale"],$res["Email"],$res["Indirizzo"],$res["Residenza"],$res["Telefono"],$res['Modp']);
		//finito di popolare l'utente
		//IDENTIFICO se l'utente è un DOCENTE, STUDENTE, ADMIN
		//echo "Id dell'UTENTE: ".$utente->id;
		//#DOCENTE
		$controllaRuolo="SELECT Id_anagrafe FROM docenti WHERE Id_anagrafe=". $utente->id;
		$risultato="";
		$risultato=$connessione->query($controllaRuolo);
		$res=$risultato->fetch_assoc();
		if ($res["Id_anagrafe"]>0){
			$utente->set_ruolo("docente");
			//echo "utente DOCENTE";
		} else {
			//#STUDENTE
			$controllaRuolo="SELECT Id_anagrafe FROM studenti WHERE Id_anagrafe=". $utente->id;
			$risultato="";
			$risultato=$connessione->query($controllaRuolo);
			$res=$risultato->fetch_assoc();
			if ($res["Id_anagrafe"]>0){
				$utente->set_ruolo("studente");
				//echo "utente STUDENTE";
			}
		}
		//#ADMIN
		$controllaRuolo="SELECT Id_anagrafe FROM amministratori WHERE Id_anagrafe=". $utente->id;
		$risultato="";
		$risultato=$connessione->query($controllaRuolo);
		$res=$risultato->fetch_assoc();
		if($res["Id_anagrafe"]>0){
			$utente->set_ruolo("admin");
			//echo "utente ADMIN";
		}

		//#ADMIN
		$controllaRuolo="SELECT Id_anagrafe FROM editor WHERE Id_anagrafe=". $utente->id;
		$risultato="";
		$risultato=$connessione->query($controllaRuolo);
		$res=$risultato->fetch_assoc();
		if($res["Id_anagrafe"]>0){
			$utente->set_ruolo("editor");
			//echo "utente ADMIN";
		}



		//FINE IDENTIFICAZIONE
		//echo " NOME UTENTE= ".$utente->nome.$utente->cognome.$utente->data_nascita.$utente->codice_fiscale.$utente->email.$utente->indirizzo.$utente->residenza.$utente->telefono;
		//echo " NOME UTENTE= ".$utente->nome;
		//echo " RUOLO= ".$utente->ruolo;
		$ruoloUtente=$utente->ruolo;
		$utente=serialize($utente);
		$_SESSION['ut'] = $utente;
	}
	//IMMETTERE QUESTE DUE RIGHE DENTRO GLI "IF" delle identificazioni
	//echo "\nReindirizzamento in corso... l'utente è un: ".$ruoloUtente;
	if($ruoloUtente==="studente"){
		@header("location:dashboard.php");
	} else if ($ruoloUtente==="docente"){
		@header("location:dashboard.php");
	} else if ($ruoloUtente==="admin"){
		@header("location:dashboard.php");
	}else if ($ruoloUtente==="editor"){
		@header("location:dashboard.php");
	}
	//FINE RIGHE DA IMMETTERE NELL'IF
	//reindirizzamento alla pagina HOME PAGE dell'utente
} else { //se non vi sono valori nel database (o vi sono più valori restituiti, anche se improbabile) allora esegui l'ELSE
	if(isset($_POST['usermail'])){
		echo "<div style=\"width:100%;background-color:#FF3333;text-align:center;\"><b>NOME UTENTE o PASSWORD errati. Riprova ad eseguire il login</b></div>";
	}
	//@session_write_close();
}
if(isset($_SESSION['autorizza_modifica'])){
	echo "<div style=\"width:100%;background-color:green;text-align:center;\"><b>Una nuova password è stata inviata all'email indicata</b></div>";
	unset($_SESSION['autorizza_modifica'] );
}
if (isset ($_SESSION['iscritto-aggiunto'])) {
    if ($_SESSION['iscritto-aggiunto'] == 1) {
			echo "<div style=\"width:100%;background-color:green;text-align:center;\"><b>La richiesta di iscrizione è stata inoltrata alla segreteria dell'Accademia</b></div>";

        $_SESSION['iscritto-aggiunto'] = 0;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<?php @include_once 'shared/head_inclusions.php';?>

</head>
<body>
	<div class="container">
		<?php
			include("shared/lingue.php");
			?>
		<!-- start header -->
		<header class="row logo-accademia">
			<div class="col-md-5"></div>

			<!-- <div class="navbar navbar-default navbar-static-top"> -->
				<!-- <div class="container"> -->
				<div class="col-md-2">
					<a href="index.php">
						<!-- <div class="navbar-header"> -->
						<img class="img-responsive" src="img/logo.png" alt="" />
						<!-- </div> -->
					</a>
				</div>

				<div class="col-md-5"></div>
			<!-- </div> -->
		</header>


		<div class="row center-block">
			<div class="col-md-4">
			</div>

			<form name="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" accept-charset="utf-8">
				<div class="col-md-4">
					<div class="row center-block">
						<label for="usermail">Email &nbsp;</label>
						<div class="row center-block">
							<input type="email" name="usermail" class="form-control" placeholder="username" required>
						</div>
					</div>
					<div class="row center-block">
						<br />
						<label for="password">Password  &nbsp;</label>
					</div>
					<div class="row center-block">
						<input type="password" name="password" class="form-control" placeholder="password" required>
					</div>
					<div class="row center-block">
						<br>
						<div class="row text-center">
							<input type="radio" name="lingua" id="lingua" value="it" checked>Italiano</input>
							<input type="radio" name="lingua" id="lingua" value="en">English</input>
							<input type="radio" name="lingua" id="lingua" value="cn">Chinese</input>
						</div>
						<br />
						<button type="submit" class="btn btn-primary center-block" aria-haspopup="false">
							Login
						</button>
					</div>
					<br />


					<br>
					<a href="registrati.php">Registrati</a>
					<br />
					<a href="ripristina_password.php">Password dimenticata ? </a>
				</div>
			</form>
			<div class="col-md-4"> </div>


		</div> <!-- /row center-block -->
	</div> <!-- /container -->
	<!-- javascript ================================================== --><!-- Placed at the end of the document so the pages load faster -->
	<!--script src="js/jquery.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/google-code-prettify/prettify.js"></script>
	<script src="js/portfolio/jquery.quicksand.js"></script>
	<script src="js/portfolio/setting.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/animate.js"></script>
	<script src="js/custom.js"></script-->

	<!-- INIZIO FOOTER -->
<footer class="navbar-fixed-bottom">
<?php @include_once 'shared/footer.php'; ?>
</footer>
</body>
</html>
