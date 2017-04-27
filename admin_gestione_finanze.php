<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
				<!-- INIZIO CARICAMENTO MENU -->
					<?php
						menu();
					?>
				<!-- FINE MENU -->

				<div class="container">
						<b>Benvenuto <?php echo $utente->nome; ?>!</b>
						<p>Qui verranno elencati i documenti caricati attraverso l'apposita pagina <a href="http://localhost/progetto_accademia/studenti_carica_documenti.php">Carica documenti</a></p>
						<!--<br />
						<p>Qui verranno elencati i documenti caricati attraverso l'apposita pagina</p> <a class="btn btn-info" href="studenti_carica_documenti.php" type="button">Carica documenti</a>
					<br />
					<br />-->
					<table class="table table-striped">
						<tr>
							<td>
								<b>Caricato da...</b>
							</td>
							<td>
								<b>Nome file</b>
							</td>
							<td>
								<b>Data caricamento</b>
							</td>
							<td>
								<b>Link di download</b>
							</td>
						</tr>
						<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
						$stringasql="SELECT a.Nome, a.Cognome, s.Nome_file, s.Data_caricamento, s.Percorso_file, s.Nome_file FROM studenti_documenti_caricati AS s, anagrafe AS a WHERE s.Id_studente=a.Id";
						$elencoCaricamenti=$connessione->query($stringasql);
						while($res=$elencoCaricamenti->fetch_assoc()){
							$nomeCognome=$res["Nome"]." ".$res["Cognome"];
							echo '<tr>';
								echo '<td>'.$nomeCognome.'</td>';
								echo '<td>'.$res["Nome_file"].'</td>';
								echo '<td>'.$res["Data_caricamento"].'</td>';
								echo '<td>';
									echo '<a  href="'.$res["Percorso_file"].$res["Nome_file"].'">Scarica File</a> &nbsp <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>';
								echo '</td>';
							echo '</tr>';
						}
						?>
					</table>
				</div>


			<!-- INIZIO FOOTER -->
			<?php @include_once 'shared/footer.php';?>
	</body>
</html>
