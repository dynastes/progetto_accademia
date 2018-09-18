<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
	</head>
	<body>

   <?php menu(); ?>

  <div class="container">
				<div>
					<p>Qui trovi tutte le comunicazioni inviate attraverso l'apposita pagina <a href="docenti_carica_avvisi.php">Nuova comunicazione</a></p>
				</div>

				<table class="table">
				<tr>
					<td><b>Data comunicazione</b></td>
					<td><b>Contenuto</b></td>
					<td><b>Opzioni</b></td>
					<td><b>Visibilità</b></td>
				</tr>
				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT Id,Testo, Data_pubblicazione, Visibilita FROM avvisi WHERE Id_docente=".$utente->id;
				$elencoCaricamenti=$connessione->query($stringasql);
				while($res=$elencoCaricamenti->fetch_assoc()){
					echo "<tr>";
						echo '<td>';
							echo $res["Data_pubblicazione"];
						echo '</td>';
						echo '<td>';
							echo $res["Testo"];
						echo '</td>';
						echo '<td>';
							?>

				<a href="admin_elimina_avvisi_query.php?ID=<?php echo $res['Id']; ?>" onclick="return sicuro('<?php echo $res['Id']; ?>')">Elimina<?php ?></a>

					<?php
						echo '</td>';
						echo '<td>';
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
