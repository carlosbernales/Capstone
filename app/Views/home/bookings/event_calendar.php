<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                eventSources: [
                    // Custom event source for each clickable date
                    function (fetchInfo, successCallback, failureCallback) {
                        var events = [];
                        var currentDate = new Date(fetchInfo.startStr);
                        var endDate = new Date(fetchInfo.endStr);
                        var today = new Date(); // Get the current date

                        while (currentDate <= endDate) {
                            // Check if the current date is in the future or today
                            if (currentDate >= today) {
                                var dateString = currentDate.toISOString().slice(0, 10);
                                
                                // Check if the date is booked
                                var isBooked = <?php echo json_encode($booked_dates); ?>.some(function (bookedDate) {
                                    return bookedDate.date === dateString;
                                });
                                
                                if (!isBooked) {
                                    events.push({
                                        title: 'Book Now',
                                        start: dateString,
                                        url: 'javascript:void(0);', // Clickable link
                                    });
                                }
                            }
                            currentDate.setDate(currentDate.getDate() + 1); // Move to the next day
                        }

                        successCallback(events);
                    },
                    // Add more event sources as needed
                ],
                eventClick: function (info) {
                    if (info.event.url) {
                        // Get the date of the clicked event
                        var clickedDate = new Date(info.event.start);
                        var year = clickedDate.getFullYear();
                        var month = clickedDate.getMonth() + 1; // Months are 0-based, so add 1
                        var day = clickedDate.getDate();

                        // Redirect to the form with the date information
                        window.location.href = 'booking_form?year=' + year + '&month=' + month + '&day=' + day;
                    }
                },
                events: [
                    // Your PHP code to generate booked dates here
                    <?php foreach ($booked_dates as $date): ?>
                    {
                        title: 'Booked',
                        start: '<?php echo $date['date']; ?>', // Date from the database
                        className: 'booked-event', // CSS class for booked events
                        editable: false, // Prevent dragging/resizing of booked events
                    },
                    <?php endforeach; ?>
                ],
            });

            calendar.render();
        });
    </script>
</head>
<body>
<div id='calendar'></div>
</body>
</html>
