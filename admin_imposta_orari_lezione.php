<?php @include_once 'menu.php'; 
if($_SESSION['modifica-orario']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Modifica effettuata correttamente</div>";
	$_SESSION['modifica-orario']=0;


}
?>
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
		<!-- INCLUSIONEPRE FULLCALENDAR -->
		<link rel='stylesheet' type='text/css' href='css/fullcalendar.css' /> 
		<script src='js/jquery.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='fullcalendar/fullcalendar.min.js'></script>
	<!-- FINE INCLUSIONE PRE FULLCALENDAR -->
		<script type='text/javascript'>
			$(document).ready(function() {

			    // page is now ready, initialize the calendar...

			    $('#calendar').fullCalendar({
			        // put your options and callbacks here
			    })

			});
		</script>
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
					<h1>Cambia docente alle materie</h1>
					<p>Scegli il professore a cui assegnare una materia differente</p>
					<form method="post" action="admin_imposta_orari_lezione_dettagli.php" name="professore-materia">
						<select name="id-materia">
						<?php
							$sqlMaterie="SELECT Id, Nome_materia FROM materie ORDER BY Nome_materia DESC";
							$res=$connessione->query($sqlMaterie);
							while($resMaterie=$res->fetch_assoc()){
								echo '<option value="'.$resMaterie["Id"].'">'.$resMaterie["Nome_materia"].'</option>';
							}
						?>
						</select>
						<input  type="submit" value="Cambia orario per questa lezione">
					</form>
				</div>
			</div>
			<div id='calendar'></div>
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
