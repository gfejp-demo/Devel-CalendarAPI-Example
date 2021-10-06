
function runExample() {

  // Get calendar list.
  let calendarList = getCalendarList();

  // Get clendar event.
  let calendarEvent = getCalendarEvents(calendarList);
}

// Get calendar list.
function getCalendarList() {
  let calendarList = [];

  // Get calrndar list.
  let response = Calendar.CalendarList.list();
  if (response) {
    let items = response.items;
    if (items) {
      for (var i=0; i<items.length; i++) {
        // Get info.
        calendarList.push({
          id: items[i].id,
          summary: items[i].summary,
        });
      }
    }
  }

  return calendarList;
}

// Get calendar event list.
function getCalendarEvents(calendarList) {

  for (var i=0; i<calendarList.length; i++) {
    let response = Calendar.Events.list(calendarList[i].id);
    Logger.log ( response );
  }

}
