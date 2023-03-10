

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
                let evColor = element.evColor;
                let txtColor = element.textColor;
                let desc = element.description;

                fakeEvents.push(
                    {
                        id: eventId,
                        title: name,
                        start: startTime,
                        end: endTime,
                        color: evColor,
                        description: desc,
                        textColor: txtColor
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
            initialDate: "2023-02-27",
            initialView: 'timeGridWeek', // Week view
            allDaySlot: false, // remove the all-day row
            height: 'auto', // adjust height
            headerToolbar: true, // remove header toolbar
            weekends: false, // remove weekends
            slotMinTime: '08:00:00',
            slotMaxTime: '18:30:00',
            slotDuration: '00:30', // set the duration to 30m
            dayHeaderFormat: { weekday: 'short' },
            displayEventTime: false,
            events: fakeEvents,
            navLinks: false,
            slotLabelFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            eventMouseEnter: function (info) {
                let eventDescription = info.event.extendedProps.description

                console.log(info);
                console.log(eventDescription);

                // create a new tooltip element
                let tooltipEl = document.querySelector(".popper-tooltip");
                tooltipEl.innerHTML = eventDescription

                Popper.createPopper(info.el, tooltipEl, { placement: 'bottom'});


                // tooltipEl.style.left = (info.jsEvent.clientX + 10) + 'px';
                // tooltipEl.style.top = (info.jsEvent.clientY + 10) + 'px';

                // add the tooltip element to the page
                //info.el.appendChild(tooltipEl);
            },
            eventMouseLeave: function (info) {
                // remove the tooltip element when the user's mouse leaves the event
                if (tooltip) {
                    //info.el.removeChild(tooltipEl);
                }
            }

        });


        calendar.render();

    });
});