<?php @include_once 'menu_bootstrap.php';
if($_SESSION["autorizzato"]===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Autorizzazione effettuata correttamente</div>";
	$_SESSION["autorizzato"]=0;
}
?>
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
						<p>Qui verranno elencate le richieste inviate dagli studenti</p>
						<div >
							<b><a href="admin_gestisci_certificati.php" >&lt;&lt; Visualizza richieste ancora da autorizzare</a></b>
						</div>
						<br />
					<table class="table table-striped">
						<tr>
							<td>
								<b>Caricato da...</b>
							</td>
							<td>
								<b>Tipo richiesta</b>
							</td>
							<td>
								<b>Data Invio</b>
							</td>
							<td>
								<b>Opzioni</b>
							</td>
						</tr>
						<?php //qui interrogo il DB per sapere la lista dei certificati richiesti dagli utenti
						$stringasql="SELECT a.Nome, a.Cognome, sr.Data_invio, sr.Id, t.Tipo
									FROM studenti_richieste AS sr, anagrafe AS a, tipo_richieste AS t
									WHERE sr.Id_anagrafe=a.Id AND t.Id=sr.Tipo AND Stato_richiesta='Confermato'";
						$elencoCaricamenti=$connessione->query($stringasql);
						while($res=$elencoCaricamenti->fetch_assoc()){
							$nomeCognome=$res["Nome"]." ".$res["Cognome"];
							echo '<tr>';
								echo '<td>'.$nomeCognome.'</td>';
								echo '<td>'.$res["Tipo"].'</td>';
								echo '<td>'.$res["Data_invio"].'</td>';
								if($res['Tipo']==="Modifica piano di studi"){
									echo '<td><a href="admin_gestisci_certificati_visualizza_testo.php?id='.$res["Id"].'&action=visualizza">Visualizza Richiesta</a> &nbsp <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>';
								} else {
									echo '<td></td>';
								}
							echo '</tr>';
						}
						?>
					</table>
				</div>
				
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
