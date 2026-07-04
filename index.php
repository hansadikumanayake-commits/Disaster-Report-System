<?php
//to make sure only the logged in users can enter into the form
session_start();
if(!isset($_SESSION["user_logged_in"])){
    header("Location:login.php");
    exit();
}
?>

<!DOCTYPE HTML>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <title>Disaster-Report-System</title>
            <!--link to the external css file of the form -->
            <link rel="stylesheet" href="style.css">
            <!--allo user to use the map to select the location-->
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        </head>
        <body>
            <a href="logout.php" class="logout-top-btn">Logout</a>    

            <!--Send the form data in a way that can include files/photos and the form data to submit.php-->
            <form action="submit.php" method="POST" enctype="multipart/form-data" id="reportForm">
            <h1>Disaster-Report-System</h1>
            
            <!--information boxes needed-->
            <label>Name:</label>
            <input type="text" name="name" required><br>

            <label>Contact Number:</label>
            <input type="text" name="tel" required><br>

            <label>Disaster Type:</label>
            <select name="disaster" required>
                <option value="">Select Disaster Type:</option>
                <option value="Flood">Flood</option>
                <option value="Landslide">Landslide</option>
                <option value="Earthquake">Earthquake</option>
                <option value="Animal Attack">Animal Attack</option>
                <option value="Drought">Drought</option>
                <option value="Tsunami">Tsunami</option>
                <option value="Fire">Fire</option>
            </select><br>


            <label>District:</label>
            <select name="district" required>
                <option value="">--Select District--</option>
                <option value="Ampara">Ampara</option>
                <option value="Anuradhapura">Anuradhapura</option>
                <option value="Badulla">Badulla</option>
                <option value="Batticaloa">Batticaloa</option>
                <option value="Colombo">Colombo</option>
                <option value="Galle">Galle</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Hambantota">Hambantota</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Kalutara">Kalutara</option>
                <option value="Kandy">Kandy</option>
                <option value="Kegalle">Kegalle</option>
                <option value="Kilinochchi">Kilinochchi</option>
                <option value="Kurunegala">Kurunegala</option>
                <option value="Mannar">Mannar</option>
                <option value="Matale">Matale</option>
                <option value="Matara">Matara</option>
                <option value="Monaragala">Monaragala</option>
                <option value="Mullaitivu">Mullaitivu</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Polonnaruwa">Polonnaruwa</option>
                <option value="Puttalam">Puttalam</option>
                <option value="Ratnapura">Ratnapura</option>
                <option value="Trincomalee">Trincomalee</option>
                <option value="Vavuniya">Vavuniya</option>
            </select><br>

            <label>Grama-Niladhari Division:</label>
            <input type="text" name="gn" required><br>

            <h3>Select Incident Location on Map</h3>
            <div id="incidentMap" class="form-map"></div>



            <label>Location:</label>
            <button type="button" onclick="getLocation()" class="location-btn">
                Get Current Location</button>

            <p id="location-status" class="location-status">Location not selected yet</p>

            <label>Latitude:</label> <!--by step=any we'll let any decimal value to be entered in the input box-->
            <input type="number" name="latitude" id="latitude" step="any" required>

            <label>Longitude:</label>
            <input type="number" name="longitude" id="longitude" step="any" required>

            <!--file input to display the photo of the disaster-->
            <label>Upload photo 1:</label>
            <input type="file" name="photo1" accept="image/*" capture="environment" required><br>

            <label>Upload photo 2:</label>
            <input type="file" name="photo2" accept="image/*" capture="environment" required><br>

            <label>Upload photo 3:</label>
            <input type="file" name="photo3" accept="image/*" capture="environment" required><br>

            <br>
            <!--button to submit the form-->
            <button type="submit">Submit</button>

            </form>

            <script>
    // Create the OpenStreetMap map inside the div called incidentMap
    var map = L.map('incidentMap').setView([7.8731, 80.7718], 7);

    // Load the OpenStreetMap map design
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // This will store the marker on the map
    var marker;

    // When user clicks on the map
    map.on('click', function(e) {
        var latitude = e.latlng.lat;
        var longitude = e.latlng.lng;

        // Fill latitude and longitude input boxes
        document.getElementById("latitude").value = latitude.toFixed(6);
        document.getElementById("longitude").value = longitude.toFixed(6);

        // Show status message
        document.getElementById("location-status").innerHTML = "Location selected from map";

        // If marker already exists, move it
        if (marker) {
            marker.setLatLng(e.latlng);
        } 
        // If marker does not exist, create it
        else {
            marker = L.marker(e.latlng).addTo(map);
        }

        marker.bindPopup("Selected Incident Location").openPopup();
    });

    // This function runs when user clicks Get Current Location button
    function getLocation() {
        let status = document.getElementById("location-status");

        if (navigator.geolocation) {
            status.innerHTML = "Getting current location...";

            navigator.geolocation.getCurrentPosition(
                function(position) {
                    let latitude = position.coords.latitude;
                    let longitude = position.coords.longitude;

                    // Fill latitude and longitude input boxes
                    document.getElementById("latitude").value = latitude.toFixed(6);
                    document.getElementById("longitude").value = longitude.toFixed(6);

                    status.innerHTML = "Current location captured successfully";

                    let currentLocation = [latitude, longitude];

                    // Move map to current location
                    map.setView(currentLocation, 15);

                    // If marker already exists, move it
                    if (marker) {
                        marker.setLatLng(currentLocation);
                    } 
                    // If marker does not exist, create it
                    else {
                        marker = L.marker(currentLocation).addTo(map);
                    }

                    marker.bindPopup("Current Location").openPopup();
                },
                function(error) {
                    status.innerHTML = "Unable to get location. Please allow location access.";
                }
            );
        } else {
            status.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    // Stop form submitting if latitude and longitude are empty
   document.getElementById("reportForm").addEventListener("submit", function(e) {
    let latitude = document.getElementById("latitude").value;
    let longitude = document.getElementById("longitude").value;

    if (latitude === "" || longitude === "") {
        e.preventDefault();
        alert("Please select the location on the map, use current location, or manually enter latitude and longitude.");
        return;
    }

    latitude = parseFloat(latitude);
    longitude = parseFloat(longitude);

    if (latitude < -90 || latitude > 90) {
        e.preventDefault();
        alert("Latitude must be between -90 and 90.");
        return;
    }

    if (longitude < -180 || longitude > 180) {
        e.preventDefault();
        alert("Longitude must be between -180 and 180.");
        return;
    }
});
    
</script>



        </body>

</html>