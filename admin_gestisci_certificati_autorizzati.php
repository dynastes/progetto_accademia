<?php @include_once 'menu.php'; 
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
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
					<p>Qui verranno elencate le richieste inviate dagli studenti</p>
					<div style="width:100%; margin-bottom:10px;">
						<b><a href="admin_gestisci_certificati.php" >&lt;&lt; Visualizza richieste ancora da autorizzare</a></b>
					</div>
				</div>
				<table id="box-caricamenti-principale">
					<tr>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:20%;">
							<b>Caricato da...</b>
						</td>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:35%;">
							<b>Tipo richiesta</b>
						</td>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:15%;">
							<b>Data Invio</b>
						</td>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:30%;">
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
								echo '<td class="box-finanze-caricate"><a href="admin_gestisci_certificati_visualizza_testo.php?id='.$res["Id"].'&action=visualizza">Visualizza Richiesta</a></td>';
							} else {
								echo '<td class="box-finanze-caricate"></td>';
							}
						echo '</tr>';
					}
					?>
				</table>
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
