<?php @include_once 'shared/menu_bootstrap.php'; 
if (isset($_SESSION['modifica-orario']))
{
	if($_SESSION['modifica-orario']===1){
		echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Modifica effettuata correttamente</div>";
		$_SESSION['modifica-orario']=0;


	}
}
?>
<html>
	<head>
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
					editable: true,
					
					events: "http://localhost/Accademia/fullcalendar/events.php",
					selectable: true,
					selectHelper: true,
					select: function(start, end, allDay) {
					 var title = prompt('Event Title:');
					 var color = document.getElementById("colore_evento").value;
					 if (title) {
					  
					 start: start.unix();
						start = moment(start).format("YYYY-MM-DD HH:mm:ss");
						end: end.unix();
						end = moment(end).format("YYYY-MM-DD HH:mm:ss");﻿
						
					 $.ajax({
					 url: "http://localhost/Accademia/fullcalendar/add_events.php",
					 data: 'title='+ title+'&start='+ start +'&end='+ end+'&color='+color,
					 type: "POST",
					 success: function(json) {
					 alert('OK');
					 }
					 
					 });
					 calendar.fullCalendar('renderEvent',
					 {
					
					 title: title,
					 start: start,
					 end: end,
					 allDay: allDay,
					 backgroundColor: color
					 },
					 true // make the event "stick"
					 );
					 }
					 calendar.fullCalendar('unselect');
					},
					editable: true,
		eventDrop: function(event, delta) {
		  start = $.fullCalendar.moment(event.start).format("YYYY-MM-DD HH:mm:ss");
		 end = $.fullCalendar.moment(event.end).format("YYYY-MM-DD HH:mm:ss");
		 $.ajax({
		 url: 'http://localhost/Accademia/fullcalendar/update_events.php',
		 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
		 type: "POST",
		 success: function(json) {
		 alert("OK");
		 }
		 });
		},
		eventResize: function(event) {
		 start = $.fullCalendar.moment(event.start).format("YYYY-MM-DD HH:mm:ss");
		 end = $.fullCalendar.moment(event.end).format("YYYY-MM-DD HH:mm:ss");
		 $.ajax({
		 url: 'http://localhost/Accademia/fullcalendar/update_events.php',
		 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
		 type: "POST",
		 success: function(json) {
		 alert("OK");
		 }
		 });
		 
		}
					
					
				});
				
			});

		</script>
		<!--<style>

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

		</style>-->
	</head>
	<body>
				<!-- INIZIO CARICAMENTO MENU -->
					<?php
						menu();
					?>
				<!-- FINE MENU -->

				<div class="container">
						<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					<div id="avvisi">
						<br />
						<h1>Mostra/inserisci eventi al calendario</h1>
						<br />
						<p>Clicca nel calendario per inserire un nuovo evento</p>
						<!--form method="post" action="admin_imposta_orari_lezione_dettagli.php" name="professore-materia">
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
						</form-->

						<label>Scegli il colore con cui evidenziare l'evento che vuoi aggiungere:</label>
						<select id="colore_evento">
							<option value="red" style="background-color:red;color: white;">Esami</option>
							<option value="blue" style="background-color:blue; color: white;">Lezioni</option>
							<option value="orange" style="background-color:orange;">Conferenze</option>
							<option value="yellow" style="background-color:yellow">Eventi</option>
						</select>
					</div>
				</div>
				<div id="calendar" style="margin-top:100px; margin-bottom:50px;"></div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
