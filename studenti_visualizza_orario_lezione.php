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
					<p>Qui verranno elencati tutti gli gli studenti che sono iscritti all'accademia</p>
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
					<td class="box-programmi-caricati"><b>Materia</b></td>
					<td class="box-programmi-caricati"><b>Inizio lezione</b></td>
					<td class="box-programmi-caricati"><b>Fine Lezione</b></td>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//acquisisco il corso dell'utente in questione
				$sqlCorso="SELECT Id_corso FROM studenti WHERE Id_anagrafe=".$utente->id;
				$res=$connessione->query($sqlCorso);
				$resIdCorso=$res->fetch_assoc();

				//prendo le materie del corso $resIdCorso
				$sqlMaterie="SELECT m.Nome_materia, m.Orario_inizio, m.Orario_fine FROM materie AS m, materie_corsi AS mc WHERE mc.Id_corso=".$resIdCorso["Id_corso"]." AND m.Id=mc.Id_materia";
				$res=$connessione->query($sqlMaterie);

				while($resMaterie=$res->fetch_assoc()){
					echo "<tr>";
						echo '<td class="box-programmi-caricati">';
							echo ucfirst(strtolower($resMaterie["Nome_materia"]));
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo $resMaterie["Orario_inizio"];
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo $resMaterie["Orario_fine"];
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
