<?php @include_once 'menu_bootstrap.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
	

	</head>
	<body>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <?php
					menu();
				?>
	</div>			
  

			<div id="contenuto"  class="container">
				<div id="benvenuto">

					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					<p><b>Tipo utente: <?php echo $utente->ruolo; ?></b></p>
				</div>
				<div id="avvisi">
				<p>QUi di seguito sono visualizzati gli avvisi pubblicati dagli utenti all'admin. Per poterli gestire, andate alla pagina <a href="admin_gestisci_certificati.php">Gestisci Richieste</a></p>
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

		<!-- INIZIO FOOTER -->
		<div id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
				<p align="center">
				Copyright © 2015 Accademia Di Belle Arti Kandinskij
				<a href="" rel="nofollow" target="_blank"></a>
				</p>
		</div> 
	</body>
</html>
