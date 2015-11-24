<?php @include_once 'menu.php'; 
/*if($_SESSION["autorizzato"]===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Autorizzazione effettuata correttamente</div>";
	$_SESSION["autorizzato"]=0;
}*/
$idTestoRichiesta=$_GET['id'];
//echo $idTestoRichiesta;
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestionale Kandinskij</title>
		<link href="css/style_nuovo.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />

		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="js/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="js/flexslider.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	</head>
	<body>
		<div id="testata">
			<img src="img/logo.png">
		</div>
		<div id="principale">
			<div id="menu">
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			</div> <!-- FINE MENU -->

			<div id="contenuto">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
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

		<!-- INIZIO FOOTER -->
		<div id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
				<p align="center">
				Copyright © 2015 Accademia Di Belle Arti Kandinskij
				<a href="" rel="nofollow" target="_blank"></a>
				</p>
			</div> 
	</body>
</html>
