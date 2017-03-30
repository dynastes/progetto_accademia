<?php @include_once 'menu_bootstrap.php'; 
/*if($_SESSION["autorizzato"]===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Autorizzazione effettuata correttamente</div>";
	$_SESSION["autorizzato"]=0;
}*/
$idTestoRichiesta=$_GET['id'];
//echo $idTestoRichiesta;
?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div id="principale">
				<div id="menu">
				<!-- INIZIO CARICAMENTO MENU -->
					<?php
						menu();
					?>
				</div> <!-- FINE MENU -->

				<div class="container">
					<div id="benvenuto">
						<!--<b>Benvenuto <?php echo $utente->nome; ?>!</b>-->
						<br />
						<p>Di seguito verrà mostrato il contenuto della richiesta inviata dallo studente.</p>
						<p>
						<?php  

						$sqlTesto="SELECT Testo, Id_anagrafe FROM studenti_richieste WHERE Id=".$idTestoRichiesta;
						//echo $sqlTesto;
						$res=$connessione->query($sqlTesto);
						$resTesto=$res->fetch_assoc();

						//ottieni nome e cognome persona
						$sqlPersona="SELECT a.Nome, a.Cognome FROM anagrafe AS a, studenti_richieste AS sr WHERE a.Id=".$resTesto['Id_anagrafe'];
						$res=$connessione->query($sqlPersona);
						$resPersona=$res->fetch_assoc();
						echo "<b>".$resPersona['Nome']." ".$resPersona['Cognome']." ha scritto: </b>";
						echo $resTesto['Testo'];

						?>
						</p>
					</div>
					<a href="admin_gestisci_certificati.php">&lt;&lt; Torna indietro</a>
				</div>
			</div>
		</div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
