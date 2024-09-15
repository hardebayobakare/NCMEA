document.addEventListener("DOMContentLoaded", function() {
  getLocation();
});

function getLocation() {
  if ("geolocation" in navigator) {
      // Check if location permission is already granted
      navigator.permissions.query({ name: 'geolocation' }).then(permissionStatus => {
          if (permissionStatus.state === 'granted') {
              // Location permission granted, proceed to get location
              getCurrentLocation();
          } else {
              // Location permission not granted, ask for permission
              askForLocationPermission();
          }
      });
  } else {
      // Geolocation not supported by the browser
      console.log("Geolocation is not supported by this browser.");
  }
}

function askForLocationPermission() {
  navigator.geolocation.getCurrentPosition(
      function(position) {
          // Location permission granted, proceed to get location
          getCurrentLocation();
      },
      function(error) {
          // Handle errors or permission denied
          getPrayers(-113.323975, 53.631611, getDate());
          localStorage.setItem("askedForLocation", "false");
          console.error('Error getting location:', error);
          // Try again after a delay
          // setTimeout(askForLocationPermission, 2000); // Try again after 2 seconds
      }
  );
}

function getCurrentLocation() {
  navigator.geolocation.getCurrentPosition(
      function(position) {
          // Successfully obtained location, do something with it
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;
          getPrayers(longitude, latitude, getDate());
      },
      function(error) {
          // Handle errors
          console.error('Error getting location:', error);
      }
  );
}

function getDate(){
  var currentDate = new Date();

  // Extract day, month, and year
  var day = currentDate.getDate();
  var month = currentDate.getMonth() + 1; // January is 0, so we add 1
  var year = currentDate.getFullYear();

  // Format day and month to have leading zeros if necessary
  if (day < 10) {
    day = '0' + day;
  }
  if (month < 10) {
    month = '0' + month;
  }

  // Create the formatted date string
  var formattedDate = day + '-' + month + '-' + year;
  return formattedDate;
}

function getPrayers(longitude, latitude, date){

  var apiUrl = "https://api.aladhan.com/v1/timings/"+date+"?latitude=" + latitude + "&longitude=" + longitude+"&method=2";

  fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        // Do something with the API response
        var timing = data["data"]["timings"];
        displayData(timing);
      })
      .catch(error => {
        // Handle errors
        console.error('Error fetching data:', error);
      });
}

function displayData(data) {
  // Get the div element where we want to display the data
  var prayerTimesList = document.querySelector('.prayer-times');

  var prayers = ["Fajr", "Sunrise", "Dhuhr", "Asr", "Maghrib", "Isha"];

  for (var i = 0; i < prayers.length; i++) {
      // Create a new list item element
      var listItem = document.createElement('li');

      // Create spans for each piece of data
      var prayerNameSpan = document.createElement('span');
      var prayerStartSpan = document.createElement('span');
      var prayerIqamahSpan = document.createElement('span');

      // Assign class names if needed
      prayerNameSpan.className = 'thm-clr'; // Assuming prayer names need special styling

      if (prayers[i]  == "Sunrise") {
          prayerNameSpan.textContent = prayers[i];
          prayerStartSpan.textContent = convertTo12HourFormat(data[prayers[i]]);
          
          prayerIqamahSpan.textContent = "-";

          // Append spans to the list item
          listItem.appendChild(prayerNameSpan);
          listItem.appendChild(prayerStartSpan);
          listItem.appendChild(prayerIqamahSpan);

          // Append the list item to the prayer times list
          prayerTimesList.appendChild(listItem);
      } else {
                  // Set the text content of the spans
          prayerNameSpan.textContent = prayers[i];
          prayerStartSpan.textContent = convertTo12HourFormat(data[prayers[i]]);
          
          // Parse the start time string into a Date object
          var startTime = data[prayers[i]].split(":")
          var iqamahHours = parseInt(startTime[0]);
          var iqamahMinutes = parseInt(startTime[1]) + 10;
          if (iqamahMinutes >= 60) {
              iqamahHours += 1;
              iqamahMinutes -= 60;
          }
          var formattedIqamahTime = (iqamahHours < 10 ? "0" + iqamahHours : iqamahHours) + ":" +
                                      (iqamahMinutes < 10 ? "0" + iqamahMinutes : iqamahMinutes);
          prayerIqamahSpan.textContent = convertTo12HourFormat(formattedIqamahTime);

          // Append spans to the list item
          listItem.appendChild(prayerNameSpan);
          listItem.appendChild(prayerStartSpan);
          listItem.appendChild(prayerIqamahSpan);

          // Append the list item to the prayer times list
          prayerTimesList.appendChild(listItem);
      }
  }
}

function convertTo12HourFormat(time24) {
  // Split the time into hours and minutes
  var timeSplit = time24.split(":");
  var hours = parseInt(timeSplit[0]);
  var minutes = timeSplit[1];

  // Determine if it's AM or PM
  var period = hours < 12 ? "AM" : "PM";

  // Adjust hours for 12-hour format
  if (hours === 0) {
      hours = 12; // 12 AM
  } else if (hours > 12) {
      hours -= 12; // PM hours
  }


  // Return the formatted time
  return hours + ":" + minutes + " " + period;
}


  











