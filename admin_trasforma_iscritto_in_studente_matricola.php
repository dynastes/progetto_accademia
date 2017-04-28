<?php @include_once 'shared/menu.php';
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
		<?php
			menu();
		?>
		<div class="container">
			<div class="page-header">
				<?php
					$queryNome="SELECT a.Nome, a.Cognome
									FROM anagrafe AS a
									WHERE a.Id=" . $_GET["Id"] . ";";
					/*$nomeUtente=($connessione->query($query))->fetch_assoc();*/
					$res=$connessione->query($queryNome);
					$nomeUtente=$res->fetch_assoc();
				?>
					<h1>Inserisci la matricola per lo studente </h1>
			</div>
			<div class="row text-center">
				<p><?php echo $nomeUtente["Nome"] . " " . $nomeUtente["Cognome"]; ?></p>
			</div>
			<form method="post" action="admin_trasforma_iscritto_in_studente_query.php">
					
				<div class="col-md-4"> </div>

				<div class="col-md-4">
					<div class="row text-center">
						<input type="text" name="matricolaStudente" class="form-control"/>
						<input type="text" name="idUtente" value="<?php echo $_GET['Id']; ?>" hidden />
						<!--button type="submit">Inserisci matricola</button-->
						<p>(ultima matricola inserita: <?php echo $matricolaUtente["Matricola"]; ?>)</p>
					</div>
					<div class="row text-center">
						<input type="submit" value="Inserisci matricola" class="btn btn-info"/>
					</div>
				</div>
				<div class="col-md-4"> </div>
			</form>
		</div>
		

	</body>
</html>
