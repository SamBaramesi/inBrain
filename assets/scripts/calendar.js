$(document).ready(function () {
    $('#fc').fullCalendar({
        header: false,
        height: 'auto',
        defaultView: 'agendaWeek',
        weekends: false,
        allDaySlot: false, // remove the all-day row
        slotDuration: '00:30', // set the duration to 1 hour
        minTime: '08:00:00', // set the start time to 8:00 am
        maxTime: '18:00:00', // set the end time to 6:00 pm
        slotLabelFormat: 'H:mm a', // set the time format to 24-hour format
        columnFormat: 'ddd', // set the date format to day name (e.g. "Mon")
        editable: false, // allow events to be edited
        events: [
            {
                title: 'Script Schrijven',
                start: '2023-02-27T08:30:00',
                end: '2023-02-27T10:00:00',
                color: "grey",
            },
            {
                title: 'Team Talk',
                start: '2023-02-27T10:15:00',
                end: '2023-02-27T11:00:00',
                color: "grey",
            },
            {
                title: 'Client meeting',
                start: '2023-02-27T11:15:00',
                end: '2023-02-27T12:15:00',
                color: "grey",
            },
            {
                title: 'lunch',
                start: '2023-02-27T12:30:00',
                end: '2023-02-27T13:00:00',
                color: "green",
            },
            {
                title: 'Workshop',
                start: '2023-02-27T13:15:00',
                end: '2023-02-27T15:30:00',
                color: "grey",
            },
            {
                title: 'work on script',
                start: '2023-02-27T15:45:00',
                end: '2023-02-27T16:30:00',
                color: "grey",
            },
            {
                title: 'lunch',
                start: '2023-02-27T12:30:00',
                end: '2023-02-27T13:00:00',
                color: "green",
            },
            {
                title: 'lunch',
                start: '2023-02-27T12:30:00',
                end: '2023-02-27T13:00:00',
                color: "green",
            },
            {
                title: 'lunch',
                start: '2023-02-27T12:30:00',
                end: '2023-02-27T13:00:00',
                color: "green",
            },
            {
                title: 'lunch',
                start: '2023-02-27T12:30:00',
                end: '2023-02-27T13:00:00',
                color: "green",
            },
            {
                title: 'Event 1',
                start: '2023-03-01T09:00:00',
                end: '2023-03-01T10:30:00'
            },
            {
                title: 'Event 1',
                start: '2023-03-01T09:00:00',
                end: '2023-03-01T10:30:00'
            },
            {
                title: 'Event 1',
                start: '2023-03-01T09:00:00',
                end: '2023-03-01T10:30:00'
            },
            {
                title: 'Event 1',
                start: '2023-03-01T09:00:00',
                end: '2023-03-01T10:30:00'
            },
            {
                title: 'Event 2',
                start: '2023-03-01T12:00:00',
                end: '2023-03-01T13:30:00'
            }
        ]
    });
});



// const events = [
//   { day: 'Monday', start: '10:00', end: '12:00', title: 'Meeting' },
//   { day: 'Tuesday', start: '14:00', end: '16:00', title: 'Training' },
//   { day: 'Wednesday', start: '9:00', end: '11:00', title: 'Presentation' },
//   { day: 'Thursday', start: '13:00', end: '15:00', title: 'Project Work' },
//   { day: 'Friday', start: '11:00', end: '13:00', title: 'Client Call' },
// ];

// const calendar = document.querySelector('.calendar');

// events.forEach(event => {
//   const dayIndex = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'].indexOf(event.day);
//   const startHour = parseInt(event.start.split(':')[0]);
//   const startMinute = parseInt(event.start.split(':')[1]);
//   const endHour = parseInt(event.end.split(':')[0]);
//   const endMinute = parseInt(event.end.split(':')[1]);
//   const startCell = (startHour - 8) * 6 + startMinute / 10 + 1;
//   const endCell = (endHour - 8) * 6 + endMinute / 10 + 1;
//   const eventDiv = document.createElement('div');
//   eventDiv.classList.add('event');
//   eventDiv.textContent = event.title;
//   eventDiv.style.gridColumnStart = dayIndex + 1;
//   eventDiv.style.gridColumnEnd = dayIndex + 2;
//   eventDiv.style.gridRowStart = startCell;
//   eventDiv.style.gridRowEnd = endCell;
//   calendar.querySelector('.body').appendChild(eventDiv);
// });