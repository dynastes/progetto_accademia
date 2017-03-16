<?php @include_once 'menu.php'; ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestionale Kandinskij</title>
		<?php @include_once 'shared/head_inclusions.php';?>
		<!-- INCLUSIONEPRE FULLCALENDAR -->
		<link href='fullcalendar/css/fullcalendar.css' rel='stylesheet' />
		<link href='fullcalendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='fullcalendar/js/moment.min.js'></script>
		<script src='fullcalendar/js/jquery.min.js'></script>
		<script src='fullcalendar/js/fullcalendar.min.js'></script>
		<script src= 'fullcalendar/js/fullcalendar.js'></script>
		<script>
			$(document).ready(function() {
				//creazione della stringa giorno
				var data = new Date();
				var giorno=data.getDate();
				var mese=data.getMonth()+1;
				var anno=data.getFullYear();
				var oggi;
				oggi=anno+'-'+mese+'-'+giorno;

				var calendar = $('#calendar').fullCalendar({
				header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: oggi,
					editable: false,
					
					events: "http://localhost/Accademia/fullcalendar/events.php",
					selectable: false,
					selectHelper: false,
					editable: false
					
					
				});
				
			});

		</script>
		<style>

			body {
				margin: 40px 10px;
				padding: 0;
				font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
				font-size: 14px;
			}

			#calendar {
				max-width: 900px;
				margin: 0 auto;
			}

		</style>
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
					<p></p>
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
				<!--table id="box-caricamenti-principale">
				<tr>
					<td class="box-programmi-caricati"><b>Nome materia</b></td>
					<td class="box-programmi-caricati"><b>Inizio orario lezione</b></td>
					<td class="box-programmi-caricati"><b>Fine orario lezione</b></td>
				</tr-->

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				/*$stringasql="SELECT Nome_materia, Orario_inizio, Orario_fine FROM materie WHERE Id_docente=".$utente->id;
				
				$elencoMaterie=$connessione->query($stringasql);
				while($res=$elencoMaterie->fetch_assoc()){
					echo "<tr>";
						echo '<td class="box-programmi-caricati">';
							echo $res["Nome_materia"];
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo $res["Orario_inizio"];
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo $res["Orario_fine"];
						echo '</td>';
					echo "</tr>";
				}
				echo "</table>";*/
				?>
				
			</div>
			<div id="calendar"  style="margin-top:100px; margin-bottom:50px;"></div>
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
