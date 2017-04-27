<?php @include_once 'menu.php';
	//prendo l'ultima matricola inserita nel DB
	$queryLastMatricola="SELECT max(Matricola) AS Matricola
					FROM studenti";
	/*$nomeUtente=($connessione->query($query))->fetch_assoc();*/
	$res=$connessione->query($queryLastMatricola);
	$matricolaUtente=$res->fetch_assoc();

?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		<div id="testata">
			<img src="img/img/logo.png">
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
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
					<?php
						$queryNome="SELECT a.Nome, a.Cognome
										FROM anagrafe AS a
										WHERE a.Id=" . $_GET["Id"] . ";";
						/*$nomeUtente=($connessione->query($query))->fetch_assoc();*/
						$res=$connessione->query($queryNome);
						$nomeUtente=$res->fetch_assoc();
					?>
					<p>Inserisci la matricola per lo studente <b><?php echo $nomeUtente["Nome"] . " " . $nomeUtente["Cognome"]; ?> </b> </p>
				</div>
				<form method="post" action="admin_trasforma_iscritto_in_studente_query.php">
						<label>Inserisci matricola dello studente</label>
						<input type="text" name="matricolaStudente"/>
						<input type="text" name="idUtente" value="<?php echo $_GET['Id']; ?>" hidden />
						<!--button type="submit">Inserisci matricola</button-->
						<input type="submit" value="Inserisci matricola" />
						<p>(ultima matricola inserita: <?php echo $matricolaUtente["Matricola"]; ?> )</p>
				</form>

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
