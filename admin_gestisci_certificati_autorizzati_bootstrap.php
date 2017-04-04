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
						<br />
						<!--<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>-->
						<p>Qui verranno elencate le richieste inviate dagli studenti</p>
						<div >
							<b><a href="admin_gestisci_certificati.php" >&lt;&lt; Visualizza richieste ancora da autorizzare</a></b>
						</div>
						<br />
					</div>
					<table class="table" id="box-caricamenti-principale">
						<tr>
							<td class="box-finanze-caricate">
								<b>Caricato da...</b>
							</td>
							<td class="box-finanze-caricate">
								<b>Tipo richiesta</b>
							</td>
							<td class="box-finanze-caricate">
								<b>Data Invio</b>
							</td>
							<td class="box-finanze-caricate">
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
								echo '<td class="box-finanze-caricate">'.$nomeCognome.'</td>';
								echo '<td class="box-finanze-caricate">'.$res["Tipo"].'</td>';
								echo '<td class="box-finanze-caricate">'.$res["Data_invio"].'</td>';
								if($res['Tipo']==="Modifica piano di studi"){
									echo '<td class="box-finanze-caricate"><a href="admin_gestisci_certificati_visualizza_testo.php?id='.$res["Id"].'&action=visualizza">Visualizza Richiesta</a> &nbsp <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>';
								} else {
									echo '<td class="box-finanze-caricate"></td>';
								}
							echo '</tr>';
						}
						?>
					</table>
				</div>
			</div>
		</div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
