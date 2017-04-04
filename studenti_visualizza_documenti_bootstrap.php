<?php @include_once 'menu_bootstrap.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
	</head>
	<body>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <?php menu(); ?>
	</div>			
 
			<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
					<p>Qui verranno elencati i documenti caricati attraverso l'apposita pagina <a href="studenti_carica_documenti.php">Carica documenti</a></p>
				</div>
				<table id="box-caricamenti-principale">
					<tr>
						<td class="box-documenti-caricati" style="background-color:#D0D0D0;">
							<b>Nome file</b>
						</td>
						<td class="box-documenti-caricati" style="background-color:#D0D0D0;">
							<b>Data caricamento</b>
						</td>
						<td class="box-documenti-caricati" style="background-color:#D0D0D0;">
							<b>Link di download</b>
						</td>
					</tr>
					<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
					$stringasql="SELECT Nome_file, Data_caricamento, Percorso_file, Nome_file FROM studenti_documenti_caricati WHERE Id_studente=".$utente->id;
					$elencoCaricamenti=$connessione->query($stringasql);
					while($res=$elencoCaricamenti->fetch_assoc()){
						echo '<tr>';
							echo '<td class="box-documenti-caricati">'.$res["Nome_file"].'</td>';
							echo '<td class="box-documenti-caricati">'.$res["Data_caricamento"].'</td>';
							echo '<td class="box-documenti-caricati">';
								echo '<a href="'.$res["Percorso_file"].$res["Nome_file"].'">Scarica File</a>';
							echo '</td>';
						echo '</tr>';
					}
					?>
				</table>
			</div>
			
<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
