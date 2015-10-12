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
					<p>Qui verranno elencati i programmi caricati attraverso l'apposita pagina <a href="docenti_carica_programma.php">Carica Programmi</a></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Nome file</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Data caricamento</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Link di download</b></p>
				</div>
				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				$stringasql="SELECT Nome_file, Data_caricamento, Percorso_file, Nome_file FROM docenti_programmi_caricati WHERE Id_docente=".$utente->id;
				$elencoCaricamenti=$connessione->query($stringasql);
				while($res=$elencoCaricamenti->fetch_assoc()){
					echo '<div class="box-programmi-caricati">';
					echo $res["Nome_file"];
					echo '</div>';
					echo '<div class="box-programmi-caricati">';
					echo $res["Data_caricamento"];
					echo '</div>';
					echo '<div class="box-programmi-caricati">';
					echo '<a href="'.$res["Percorso_file"].$res["Nome_file"].'">Scarica File</a>';
					echo '</div>';
				}
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