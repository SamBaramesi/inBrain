

$(document).ready(function () {
    $.getJSON("facature.json", function (data) {
        
        let section = document.querySelector(".workWeek");
        let week = data[2].sectionContent[4].sectionContent
        let fakeEvents = [];
        
        week.forEach(day => {
            for (let i = 0; i < day.values.length; i++) {
                const element = day.values[i];
                
                
                let name = element.title;
                let startTime = element.dateStart + element.timeStart;
                let endTime = element.dateEnd + element.timeEnd;
                let eventId = element.id;
                
                console.log(name);
                console.log(startTime);
                console.log(endTime);
                
                fakeEvents.push(
                    {
                        id: eventId,
                        title: name,
                        start: startTime,
                        end: endTime
                    },
                )

            }

        });

        
        
        let h1 = document.createElement("h1");
        h1.innerHTML = "Werk Week";
        section.appendChild(h1);
        
        let div = document.createElement("div");
        div.classList.add("calendar");
        div.id = "fc";
        section.appendChild(div);
        
        let calendar = new FullCalendar.Calendar(div, {
            themeSystem: 'bootstrap5',
            allDaySlot: false, // remove the all-day row
            height: 'auto',
            initialView: 'timeGridWeek',
            headerToolbar: false,
            weekends: false,
            slotMinTime: '08:00:00',
            slotMaxTime: '18:00:00',
            events: fakeEvents,
            slotDuration: '00:30', // set the duration to 1 hour
            handleWindowResize: true,
            windowResizeDelay: 1,
            dayHeaderFormat: { weekday: 'short' },
            navLinks: false,
            eventInteractive: true,
            eventBackgroundColor: "yellow",
            eventBorderColor: "red",
            eventTextColor: "black",
            eventDisplay: 'list-item',
            displayEventTime: false,
        });
        
        
        calendar.render();
        
        console.log(calendar);
        
        // slotLabelFormat: 'H:mm a', // set the time format to 24-hour format
        // columnFormat: 'ddd', // set the date format to day name (e.g. "Mon")
        // editable: false, // allow events to be edited


        // $('#fc').fullCalendar({

        // });
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