    let defaultView = 'dayGridMonth'; // Default view for desktop
    let isMobile = /iPhone|iPad|iPod|Android|webOS|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    // golobal variable of events
    let events = [];
$(document).ready(()=>{
  // change the view of fullcalender in mobile
  if(isMobile){
    defaultView = 'timeGridDay'
  }
  fetchData()
})
function fetchData(){
  axios.get('aceeuilData.php?aff=calendrier')
  .then(res =>{
    res.data.map(el=>{
        let event = {
            title: el.titre,
            start: el.debutT,
            end : el.finT,
            extendedProps: {
                description: el.description,
                bgClr: el.procColor,
                id: el.id,
              },
        }
        events.push(event)
      })
      eventss()
  })
}
function eventss(){

  let uiCalender = document.getElementById("calendar");
  let calendar = new FullCalendar.Calendar(uiCalender, {
    initialView: defaultView,
      headerToolbar: {
          left  : 'prev,next today',
          center: 'title',
          right : 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        events: events,
        eventMouseEnter: function(info) {
          if(calendar.view.type == 'dayGridMonth' || calendar.view.type == 'timeGridWeek'){
              // Create a tooltip element
          var tooltip = document.createElement('div');
          tooltip.classList.add('event-tooltip');
          tooltip.innerHTML = info.event.extendedProps.description;
    
          // Position the tooltip relative to the mouse pointer
          tooltip.style.position = 'fixed';
          tooltip.style.background = '#19A7CE';
          tooltip.style.color = '#FEFF86';
          tooltip.style.zIndex = '10';
          // tooltip.style.color = '#fff';
          tooltip.style.top = info.jsEvent.clientY + 'px';
          tooltip.style.left = info.jsEvent.clientX + 'px';
    
          // Append the tooltip to the body
          document.body.appendChild(tooltip);
          }
        },
    
        eventMouseLeave: function(info) {
          // Remove the tooltip element
          if(calendar.view.type == 'dayGridMonth' || calendar.view.type == 'timeGridWeek'){
          var tooltip = document.querySelector('.event-tooltip');
          if (tooltip) {
            tooltip.remove();
          }}
        },
        eventDidMount: function(info) {
          info.el.style.backgroundColor = info.event.extendedProps.bgClr
          info.el.style.color = '#fff'
          // Check if the current view is "day"
          if (calendar.view.type === 'timeGridDay') {
            // Create a description element
            var description = document.createElement('div');
            description.classList.add('event-description');
            description.innerHTML = info.event.extendedProps.description;
              console.log(info.event.extendedProps.description)
              let current = info.el
              var descriptions = info.el.querySelector('.fc-event-main');
              description.style.background = '#19A7CE'
              description.style.color = '#FEFF86'
              description.style.padding = '2px'
              description.style.borderRadius = '5px'
            // Position the description element at the top of the event element
            descriptions.append(description);
          }
        },
        eventClick: function(info){
          // TODO: when we click in the event we should change the color of the event
          let id = info.event.extendedProps.id;
          Swal.fire({
            title: 'Voulez-vous confirmer que cette tache est fini?',
            showCancelButton: true,
            confirmButtonText: 'Oui!',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              axios.get(`aceeuilData.php?aff=confirm&id=${id}`)
              .then(res=>{
                calendar = null
                events = []
                fetchData()
                eventss()
                
              })
              .catch(err=>{
                // Swal.fire('Error!')
              })
            }
          })
        },
        viewDidMount: function(arg) {
          // Check if the current view is "day"
          if (arg.view.type === 'timeGridDay' && isMobile) {
            $('.fc-timeGridWeek-button').hide()
            $('.fc-dayGridMonth-button').hide()
            $('.fc-timeGridDay-button').hide()  
            $('.fc-toolbar.fc-header-toolbar').addClass('row col-lg-12');
            // Reattach the eventDidMount callback for all events
            arg.el.querySelectorAll('.fc-event').forEach(function(eventElement) {
              var eventId = eventElement.getAttribute('data-event-id');
              var event = calendar.getEventById(eventId);
              calendar.eventDidMount({ el: eventElement, event: event });
            });
          }
        },
        selectable: true,
        locale: 'fr'
    });
    calendar.render();
}

