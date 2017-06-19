<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php'; ?>
		<meta charset="utf-8">
	</head>
	<body>
<div id="principale">
<div id="menu">
			<?php
				menu();
			?>
		</div> <!-- FINE MENU -->


			<div class="container">
				<div id="benvenuto">

					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					<br />
					<br />
					<p><b>Tipo utente: <?php echo $utente->ruolo; ?></b></p>
				</div>
				<div id="avvisi">
				<div class="col-md-8">
				<p>Qui di seguito sono visualizzati gli avvisi pubblicati dagli utenti all'admin. Per poterli gestire, andate alla pagina "Gestisci richieste"</p> <a class="btn btn-info" href="admin_gestisci_certificati.php" type="button">Gestisci richieste</a>
					<br />
					<br />
					<table class="table table-striped">
						<tr>
							<th >
								<b>Caricato da...</b>
							</th>
							<th >
								<b>Tipo richiesta</b>
							</th>
							<th >
								<b>Data Invio</b>
							</th>
						</tr>
						<tr>
							<td>sfgnd</td>
							<td>skdjnvksdjvsd</td>
							<td>skdjnvksdjvsd</td>
						</tr>
						<?php //qui interrogo il DB per sapere la lista dei certificati richiesti dagli utenti
						$stringasql="SELECT a.Nome, a.Cognome, sr.Data_invio, sr.Id, t.Tipo
									FROM studenti_richieste AS sr, anagrafe AS a, tipo_richieste AS t
									WHERE sr.Id_anagrafe=a.Id AND t.Id=sr.Tipo AND Stato_richiesta='Non letto'";
						$elencoCaricamenti=$connessione->query($stringasql);
						while($res=$elencoCaricamenti->fetch_assoc()){
							$nomeCognome=$res["Nome"]." ".$res["Cognome"];
							echo '<tr>';
								echo '<td>'.$nomeCognome.'</td>';
								echo '<td >'.$res["Tipo"].'</td>';
								echo '<td >'.$res["Data_invio"].'</td>';
							echo '</tr>';
						}
						?>
					</table>
					
				</div>
				
			</div>
			
			</div>
			
			</div>
			<br><br>
<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
