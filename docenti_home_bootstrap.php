<!-- 
<?php @include_once 'menu_bootstrap.php'; ?>
convertita la grafica in bootstrap ma i link fanno riferimento alle vecchie pagine 
non convertite

-->

 <!DOCTYPE html>

<html>
<head>
	<?php @include_once 'shared/head_inclusions.php';?> 
</head>
<body>



	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <?php
					menu();
				?>
	</div>			


<div id="contenuto">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome;?>!</b>
					<p>Qui sotto vengono elencati gli avvisi pubblicati da lei (sia alla segreteria che a studenti)</p>
				</div>
				<div id="elenco-avvisi">
						<?php
							$sqlavvisi="SELECT an.Nome, an.Cognome, av.Testo, av.Data_pubblicazione FROM avvisi AS av, anagrafe AS an WHERE av.Id_docente=an.Id ";//AND Visibilita='pubblico'
							$avvisiLista=$connessione->query($sqlavvisi);
							echo '<table id="box-caricamenti-principale">';
							echo '<tr>';
								echo '<td style="width:17%;" class="box-avvisi-home"><b>Nome</b></td>';
								echo '<td style="width:17%;" class="box-avvisi-home"><b>Cognome</b></td>';
								echo '<td style="width:46%;" class="box-avvisi-home"><b>Testo</b></td>';
								echo '<td style="width:20%;" class="box-avvisi-home"><b>Data Pubblicazione</b></td>';
							echo '</tr>';
							while($resAvvisi=$avvisiLista->fetch_assoc()){
								echo '<tr>';
									echo '<td style="width:17%;" class="lista-avvisi-home">'.$resAvvisi["Nome"].'</td>';
									echo '<td style="width:17%;" class="lista-avvisi-home">'.$resAvvisi["Cognome"].'</td>';
									echo '<td style="width:46%;" class="lista-avvisi-home">'.$resAvvisi["Testo"].'</td>';
									echo '<td style="width:20%;" class="lista-avvisi-home">'.$resAvvisi["Data_pubblicazione"].'</td>';
								echo '</tr>';
							}
							echo "</table>";
						?>
					</div>
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