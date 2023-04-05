window.startCalendar = function startCalendar(jsonData) {


    let section = document.querySelector(".workWeek");
    let week = jsonData[2].sectionContent[4].sectionContent
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
                    backgroundColor: evColor,
                    borderColor: evColor,
                    textColor: txtColor,
                    description: desc,
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

            if (eventDescription) {

                let tooltipEl = document.createElement("span");
                tooltipEl.classList.add("popper-tooltip");
                tooltipEl.innerHTML = eventDescription
                section.appendChild(tooltipEl);
                Popper.createPopper(info.el, tooltipEl, { placement: 'top' });
            }

        },
        eventMouseLeave: function (info) {
            let tooltipEl = document.querySelector(".popper-tooltip");
            tooltipEl.classList.remove("popper-tooltip");
            tooltipEl.classList.add("popper-tooltip-hide");
        }
    });

    calendar.render();

}