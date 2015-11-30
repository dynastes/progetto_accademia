<?php @include_once 'menu.php'; ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestionale Kandinskij</title>
		<link href="css/style_nuovo.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />

		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="js/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="js/flexslider.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
				</div>
				<div id="avvisi">
					<p>Qui verranno visualizzati gli ultimi 10 avvisi pubblicati da segreteria o docenti. Per vedere lo storico completo degli avvisi, andare nella pagina Avvisi.</p>
					<div id="elenco-avvisi">
						<?php
							$sqlavvisi="SELECT an.Nome, an.Cognome, av.Testo, av.Data_pubblicazione FROM avvisi AS av, anagrafe AS an WHERE Visibilita='pubblico'"; //av.Id_docente=an.Id AND
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
		</div>

		<!-- INIZIO FOOTER -->
		<div id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
				<p align="center">
					Copyright © 2015 Accademia Di Belle Arti Kandinskij
				</p>
			</div> 
	</body>
</html>
