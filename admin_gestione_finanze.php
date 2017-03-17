<?php @include_once 'menu.php'; ?>
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
					<p>Qui verranno elencati i documenti caricati attraverso l'apposita pagina <a href="studenti_carica_documenti.php">Carica documenti</a></p>
				</div>
				<table id="box-caricamenti-principale">
					<tr>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:20%;">
							<b>Caricato da...</b>
						</td>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0;">
							<b>Nome file</b>
						</td>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:20%;">
							<b>Data caricamento</b>
						</td>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:20%;">
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
								echo '<a href="'.$res["Percorso_file"].$res["Nome_file"].'">Scarica File</a>';
							echo '</td>';
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
