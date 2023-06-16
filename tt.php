<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='../lib/main.css' rel='stylesheet' />
<script src='../lib/main.js'></script>
<script>

function getDateToday()
{
    const today = new Date();
    const dd = String(today.getDate()).padStart(2, '0');
    const mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    const yyyy = today.getFullYear();

    return [mm, dd, yyyy];
}

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    const [mm, dd, yyyy] = getDateToday();

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prevYear,prev,next,nextYear today',
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay'
        },
        initialDate: `${yyyy}-${mm}-12`,
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [
            {
                title: 'All Day Event',
                start: `${yyyy}-${mm}-01`
            },
            {
                title: 'Long Event',
                start: `${yyyy}-${mm}-07`,
                end: `${yyyy}-${mm}-10`
            },
            {
                groupId: 999,
                title: 'Repeating Event',
                start: `${yyyy}-${mm}-09T16:00:00`
            },
            {
                groupId: 999,
                title: 'Repeating Event',
                start: `${yyyy}-${mm}-16T16:00:00`
            },
            {
                title: 'Conference',
                start: `${yyyy}-${mm}-11`,
                end: `${yyyy}-${mm}-13`
            },
            {
                title: 'Meeting',
                start: `${yyyy}-${mm}-12T10:30:00`,
                end: `${yyyy}-${mm}-12T12:30:00`
            },
            {
                title: 'Lunch',
                start: `${yyyy}-${mm}-12T12:00:00`
            },
            {
                title: 'Meeting',
                start: `${yyyy}-${mm}-12T14:30:00`
            },
            {
                title: 'Happy Hour',
                start: `${yyyy}-${mm}-12T17:30:00`
            },
            {
                title: 'Dinner',
                start: `${yyyy}-${mm}-12T20:00:00`
            },
            {
                title: 'Birthday Party',
                start: `${yyyy}-${mm}-13T07:00:00`
            },
            {
                title: 'Click for Google',
                url: 'https://google.com/',
                start: `${yyyy}-${mm}-28`
            }
        ],
        eventClick: function(event) {
            if (event.event.url) {
                event.jsEvent.preventDefault();
                window.open(event.event.url, "_blank");
            }
        }
    });

    calendar.render();
});

</script>
<style>

body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
}

#calendar {
    max-width: 1100px;
    margin: 0 auto;
}

</style>
</head>
<body>

<div id='calendar'></div>

</body>
</html>