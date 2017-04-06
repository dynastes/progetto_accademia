<!-- 
<?php @include_once 'shared/head_inclusions.php';?>
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
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome;?>!</b>
					<p>Qui sotto vengono elencati gli avvisi pubblicati da lei (sia alla segreteria che a studenti)</p>
				</div>
				<div id="elenco-avvisi">
						<?php
							$sqlavvisi="SELECT an.Nome, an.Cognome, av.Testo, av.Data_pubblicazione FROM avvisi AS av, anagrafe AS an WHERE av.Id_docente=an.Id ";//AND Visibilita='pubblico'
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
				<?php @include_once 'shared/footer.php'; ?>
</body>
</html>