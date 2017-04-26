<?php @include_once 'shared/menu_bootstrap.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
	</head>
	<body>
	
   <?php menu(); ?>
		
 
			<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
					<p>Qui verranno elencati i documenti caricati attraverso l'apposita pagina <a href="studenti_carica_documenti.php">Carica documenti</a></p>
				</div>
				<table class = "table table-striped">
					<tr>
						<td >
							<b>Nome file</b>
						</td>
					<td >
							<b>Data caricamento</b>
						</td>
					<td >
							<b>Link di download</b>
						</td>
					</tr>
					<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
					$stringasql="SELECT Nome_file, Data_caricamento, Percorso_file, Nome_file FROM studenti_documenti_caricati WHERE Id_studente=".$utente->id;
					$elencoCaricamenti=$connessione->query($stringasql);
					while($res=$elencoCaricamenti->fetch_assoc()){
						echo '<tr>';
							echo '<td>'.$res["Nome_file"].'</td>';
							echo '<td>'.$res["Data_caricamento"].'</td>';
							echo '<td>';
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
