<!--
<?php @include_once 'shared/menu.php'; ?>
convertita la grafica in bootstrap ma i link fanno riferimento alle vecchie pagine
non convertite

-->

 <!DOCTYPE html>

<html>
<head>
	<?php @include_once 'shared/head_inclusions.php';?>
</head>
<body>


   <?php menu(); ?>

  <div class="container">
				<div id="avvisi">
					<p>Qui verranno visualizzati gli ultimi 10 avvisi pubblicati da segreteria o docenti. Per vedere lo storico completo degli avvisi, andare nella pagina Avvisi.</p>
					<div id="elenco-avvisi">
						<?php
							$sqlavvisi="SELECT an.Nome, an.Cognome, av.Testo, av.Data_pubblicazione FROM avvisi AS av, anagrafe AS an WHERE Visibilita='pubblico' AND an.Id = av.Id_docente ORDER BY av.Data_pubblicazione DESC"; //av.Id_docente=an.Id AND
							$avvisiLista=$connessione->query($sqlavvisi);
							echo '<table class="table">';
							echo '<tr>';
								echo '<td><b>Nome</b></td>';
								echo '<td><b>Cognome</b></td>';
								echo '<td><b>Testo</b></td>';
								echo '<td><b>Data Pubblicazione</b></td>';
							echo '</tr>';
							while($resAvvisi=$avvisiLista->fetch_assoc()){
								echo '<tr>';
									echo '<td>'.$resAvvisi["Nome"].'</td>';
									echo '<td>'.$resAvvisi["Cognome"].'</td>';
									echo '<td>'.$resAvvisi["Testo"].'</td>';
									echo '<td>'.$resAvvisi["Data_pubblicazione"].'</td>';
								echo '</tr>';
							}
							echo "</table>";
						?>
					</div>
				</div>
		</div>

	<?php @include_once 'shared/footer.php'; ?>

</body>
</html>
