<?php @include_once 'menu_bootstrap.php'; ?>
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
						<!--<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>-->
						<br />
						<p>Qui verranno elencati i documenti caricati attraverso l'apposita pagina</p> <a class="btn btn-info" href="studenti_carica_documenti.php" type="button">Carica documenti</a>
					<br />
					<br />
					<table class="table" id="box-caricamenti-principale">
						<tr>
							<td class="box-finanze-caricate">
								<b>Caricato da...</b>
							</td>
							<td class="box-finanze-caricate">
								<b>Nome file</b>
							</td>
							<td class="box-finanze-caricate">
								<b>Data caricamento</b>
							</td>
							<td class="box-finanze-caricate">
								<b>Link di download</b>
							</td>
						</tr>
						<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
						$stringasql="SELECT a.Nome, a.Cognome, s.Nome_file, s.Data_caricamento, s.Percorso_file, s.Nome_file FROM studenti_documenti_caricati AS s, anagrafe AS a WHERE s.Id_studente=a.Id";
						$elencoCaricamenti=$connessione->query($stringasql);
						while($res=$elencoCaricamenti->fetch_assoc()){
							$nomeCognome=$res["Nome"]." ".$res["Cognome"];
							echo '<tr>';
								echo '<td class="box-finanze-caricate">'.$nomeCognome.'</td>';
								echo '<td class="box-finanze-caricate">'.$res["Nome_file"].'</td>';
								echo '<td class="box-finanze-caricate">'.$res["Data_caricamento"].'</td>';
								echo '<td class="box-finanze-caricate">';
									echo '<a  href="'.$res["Percorso_file"].$res["Nome_file"].'">Scarica File</a> &nbsp <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>';
								echo '</td>';
							echo '</tr>';
						}
						?>
					</table>
				</div>
			</div>

			<!-- INIZIO FOOTER -->
			<?php @include_once 'shared/footer.php';?>
	</body>
</html>
