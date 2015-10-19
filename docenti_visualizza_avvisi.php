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
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
					<p>Qui verranno elencati tutti gli avvisi da Lei caricati attraverso l'apposita pagina <a href="docenti_carica_avvisi.php">Carica Avvisi</a></p>
				</div>
				<!--div class="box-programmi-caricati">
					<p><b>Data Pubblicazione</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Testo dell'avviso</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Opzioni</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Visibilità</b></p>
				</div-->
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
