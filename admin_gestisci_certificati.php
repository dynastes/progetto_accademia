<?php @include_once 'shared/menu.php';

if (isset($_SESSION["autorizzato"])){
	if($_SESSION["autorizzato"]===1){
		echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Autorizzazione effettuata correttamente</div>";
		$_SESSION["autorizzato"]=0;
	}
}
?>
	<?php
			if($utente->get_ruolo() !="admin" and $utente->get_ruolo() != "editor"){
				header("location: index.php");
			}
		?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
		<script src="sorttable.js"></script>
	</head>
	<body>
				<!-- INIZIO CARICAMENTO MENU -->
					<?php
						menu();
					?>
				<!-- FINE MENU -->

				<div class="container">
						<b>Benvenuto <?php echo $utente->nome; ?>!</b>
						<br />
						<p>Qui verranno elencate le richieste inviate dagli studenti</p>
						<div >
							<b><a href="admin_gestisci_certificati_autorizzati.php" >Visualizza richieste autorizzate &gt;&gt;</a></b>
						</div>
						<br />
					<table class="table sortable table-striped">
						<tr>
							<th>
								Caricato da...
							</th>
							<th>
								Tipo richiesta
							</th>
							<th>
								Data Invio
							</th>
							<th>
								Opzioni
							</th>
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
								echo '<td>'.$res["Tipo"].'</td>';
								echo '<td>'.$res["Data_invio"].'</td>';
								if($res['Tipo']==="Modifica piano di studi"){
									echo '<td><a href="admin_gestisci_certificati_visualizza_testo.php?id='.$res["Id"].'&action=visualizza">Elabora richiesta</a> </td>';
								} else {
									echo '<td><a href="admin_autorizza_certificati.php?Id='.$res["Id"].'">Autorizza certificato</a></td>';
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
