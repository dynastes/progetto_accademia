<script>

  $(document).ready(function() {

    var data = new Date();
    var giorno=data.getDate();
    var mese=data.getMonth()+1;
    var anno=data.getFullYear();
    var oggi;


    oggi=anno+'-'+mese+'-'+giorno;

    var calendar = $('#calendar').fullCalendar({
      lang:'it',
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
    
      editable: true,
      allDaySlot: false,
      events: "fullcalendar/events.php",
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
       var title = prompt('Event Title:');
       var color = document.getElementById("colore_evento").value;
       var text_color = document.getElementById("colore_testo").value;
       if (title) {

       start: start.unix();
        start = moment(start).format("YYYY-MM-DD HH:mm:ss");
        end: end.unix();
        end = moment(end).format("YYYY-MM-DD HH:mm:ss");﻿

       $.ajax({
       url: "fullcalendar/add_events.php",
       data: 'title='+ title+'&start='+ start +'&end='+ end+'&color='+color +'&text_color='+text_color,
       type: "POST",
       success: function(json) {

        window.location.reload();
       }

       });
       calendar.fullCalendar('renderEvent',
       {

       title: title,
       start: start,
       end: end,
       allDay: allDay,
       backgroundColor: color,
       textColor : text_color
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
	 url: 'fullcalendar/update_events.php',
	 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
	 type: "POST",
	 success: function(json) {
	 }
 });
},
eventResize: function(event) {
 start = $.fullCalendar.moment(event.start).format("YYYY-MM-DD HH:mm:ss");
 end = $.fullCalendar.moment(event.end).format("YYYY-MM-DD HH:mm:ss");
 $.ajax({
 url: 'fullcalendar/update_events.php',
 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
 type: "POST",
 success: function(json) {

 }
 });

},
eventRender: function(calEvent,element) {
      element.bind('dblclick', function() {
		  eventId = calEvent.id;	  
		  $.ajax({
			 url: 'fullcalendar/delete_events.php',
			 data: 'id='+ eventId ,
			 type: "POST",
			 success: function(json) {

			  window.location.reload();
			 }
		 });
      });
   },


    });

  });
</script>
<style>

  body {
    /*margin: 40px 10px;*/
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    /*font-size: 14px;*/
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }
</style>
