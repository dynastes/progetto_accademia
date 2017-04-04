<?php @include_once 'menu_bootstrap.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		
<?php @include_once 'menu_bootstrap.php'; ?>



   <?php menu(); ?>
	
  <div class="container">
				<div>
					<p>Qui verranno elencati tutti gli avvisi da Lei caricati attraverso l'apposita pagina <a href="docenti_carica_avvisi.php">Carica Avvisi</a></p>
				</div>
				
				<table id="box-caricamenti-principale">
				<tr>
					<td class="box-programmi-caricati"><b>Data pubblicazione</b></td>
					<td class="box-programmi-caricati"><b>Testo dell'avviso</b></td>
					<td class="box-programmi-caricati"><b>Opzioni</b></td>
					<td class="box-programmi-caricati"><b>Visibilità</b></td>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT Testo, Data_pubblicazione, Visibilita FROM avvisi WHERE Id_docente=".$utente->id;
				$elencoCaricamenti=$connessione->query($stringasql);
				while($res=$elencoCaricamenti->fetch_assoc()){
					echo "<tr>";
						echo '<td class="box-programmi-caricati">';
							echo $res["Data_pubblicazione"];
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo $res["Testo"];
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo '<a href="#">Cancella Avviso (non funzionante)</a>';
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							if($res["Visibilita"]==="pubblico"){
								echo '<span style="color:green;">'.$res["Visibilita"].'</span>';
							} else {
								echo '<span style="color:red;">'.$res["Visibilita"].'</span>';
							}
						echo '</td>';
					echo "</tr>";
				}
				echo "</table>";
				?>
				
			</div>
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
