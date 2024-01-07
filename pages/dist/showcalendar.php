
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Orbit | Calendar</title>

    <!-- CALENDAR SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [{
                        title: 'xmas',
                        start: '2023-12-25'
                    },
                    {
                        title: 'hell',
                        start: '2023-12-01',
                        end: '2024-01-22'
                    }
                ]
            });
            calendar.render();
        });
    </script>
</head>

<div id="calendar" style="width: 800px;"></div>
</body>

</html>