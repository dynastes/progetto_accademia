
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
	<?php @include_once 'menu_bootstrap.php'; ?>
	

	
   <?php menu(); ?>
			
  
<div class="container">
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
					$stringasql="SELECT Nome_file, Data_caricamento, Percorso_file, Nome_file FROM docenti_programmi_caricati WHERE Id_docente=".$utente->id;
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
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php'; ?>
		
	</body>
</html>
