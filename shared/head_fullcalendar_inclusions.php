<!-- INCLUSIONEPRE FULLCALENDAR -->
<link href='fullcalendar/css/fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='fullcalendar/js/moment.min.js'></script>
<script src='fullcalendar/js/jquery.min.js'></script>
<script src='fullcalendar/js/fullcalendar.min.js'></script>
<script src= 'fullcalendar/js/fullcalendar.js'></script>
<script src= 'fullcalendar/lang/it.js'></script>

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
