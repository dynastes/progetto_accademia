<?php
echo ?>
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src= 'js/fullcalendar.js'></script>
<script>
	$(document).ready(function() {

		var calendar = $('#calendar').fullCalendar({
		header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '2015-02-12',
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

<?php 
?>