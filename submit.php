<?php
session_start();

// Make sure only logged in users can submit the form
if (!isset($_SESSION["user_logged_in"])) {
    header("Location: login.php");
    exit();
}

// Connect the database
include 'db.php';

// Function to show message page
function showMessage($title, $message, $buttonText, $buttonLink) {
    echo "<!DOCTYPE HTML>";
    echo "<html>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<link rel='stylesheet' href='style.css'>";
    echo "<title>Submit Report</title>";
    echo "</head>";
    echo "<body>";
    echo "<div class='submit-message'>";
    echo "<h2>$title</h2>";
    echo "<p>$message</p>";
    echo "<a class='submit-another-btn' href='$buttonLink'>$buttonText</a>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
}

// Check whether form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    showMessage("Invalid Request", "Please submit the form properly.", "Back to Form", "index.php");
    exit();
}

// Getting form data
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$tel = mysqli_real_escape_string($conn, $_POST["tel"]);
$disaster = mysqli_real_escape_string($conn, $_POST["disaster"]);
$district = mysqli_real_escape_string($conn, $_POST["district"]);
$gn = mysqli_real_escape_string($conn, $_POST["gn"]);

// Latitude and longitude obtained from form
$latitude = trim($_POST["latitude"]);
$longitude = trim($_POST["longitude"]);

// Server-side validation for latitude and longitude
if ($latitude === "" || $longitude === "") {
    showMessage(
        "Location Required",
        "Please select the location on the map, use current location, or manually enter latitude and longitude.",
        "Back to Form",
        "index.php"
    );
    exit();
}

if (!is_numeric($latitude) || !is_numeric($longitude)) {
    showMessage(
        "Invalid Location",
        "Latitude and longitude must be valid numbers.",
        "Back to Form",
        "index.php"
    );
    exit();
}

// Convert latitude and longitude into numbers
$latitude = (float)$latitude;
$longitude = (float)$longitude;

// Check latitude range
if ($latitude < -90 || $latitude > 90) {
    showMessage(
        "Invalid Latitude",
        "Latitude must be between -90 and 90.",
        "Back to Form",
        "index.php"
    );
    exit();
}

// Check longitude range
if ($longitude < -180 || $longitude > 180) {
    showMessage(
        "Invalid Longitude",
        "Longitude must be between -180 and 180.",
        "Back to Form",
        "index.php"
    );
    exit();
}

// Save the uploaded photos inside the uploads folder
$photo_folder = "uploads/";

// Create uploads folder if it does not exist
if (!is_dir($photo_folder)) {
    mkdir($photo_folder, 0777, true);
}

// Function to upload photo
function uploadPhoto($photoName, $photo_folder) {

    // Check whether file input exists and upload has no errors
    if (isset($_FILES[$photoName]) && $_FILES[$photoName]['error'] == 0) {

        // Create unique filename using time and original file name
        $file_name = time() . "_" . uniqid() . "_" . basename($_FILES[$photoName]['name']);

        // Create full path
        $target_file = $photo_folder . $file_name;

        // Move uploaded photo from temporary folder to uploads folder
        if (move_uploaded_file($_FILES[$photoName]['tmp_name'], $target_file)) {
            return $target_file;
        }
    }

    // If photo upload fails, return empty value
    return "";
}

// Upload each photo and save its path
$photo1 = uploadPhoto("photo1", $photo_folder);
$photo2 = uploadPhoto("photo2", $photo_folder);
$photo3 = uploadPhoto("photo3", $photo_folder);

// Escape photo paths before saving
$photo1 = mysqli_real_escape_string($conn, $photo1);
$photo2 = mysqli_real_escape_string($conn, $photo2);
$photo3 = mysqli_real_escape_string($conn, $photo3);

// Insert the form data into disaster_reports table
$sql = "INSERT INTO disaster_reports
(name, tel, disaster, district, gn, latitude, longitude, photo1, photo2, photo3)
VALUES
('$name', '$tel', '$disaster', '$district', '$gn', '$latitude', '$longitude', '$photo1', '$photo2', '$photo3')";

// Run SQL query and check whether data inserted
if (mysqli_query($conn, $sql)) {

    showMessage(
        "Report Submitted Successfully!",
        "Disaster report has been saved.",
        "Submit Another Report",
        "index.php"
    );

} else {

    showMessage(
        "Error Occurred",
        mysqli_error($conn),
        "Back to Form",
        "index.php"
    );
}

// Close the database connection
mysqli_close($conn);
?>