# Disaster Report System

## Project Description

The Disaster Report System is a web-based application developed using PHP and MySQL. The main purpose of this system is to allow users to report disaster incidents by submitting their personal details, selecting a disaster type, entering a GeoTag, and uploading disaster-related photos.

This system is designed for disaster situations that may occur in Sri Lanka, such as floods, landslides, animal attacks, storms, heavy rain, drought, fire, tsunami, building collapse, and other emergency incidents.

## Main Features

* Submit disaster reports through a client form
* Enter name and contact number
* Select disaster type from a dropdown list
* Enter a GeoTag or district related to the disaster
* Upload up to three disaster photos
* Store report details in a MySQL database
* Store uploaded photos in an `uploads` folder
* Store uploaded photo paths in the database
* View all submitted reports in an admin panel
* Display uploaded photos in the admin panel

## How the System Works

The system starts with the client report form. The user enters their name and contact number, selects the disaster type from the dropdown list, enters the GeoTag or district, and uploads up to three disaster-related photos. After clicking the submit button, the data is sent to the PHP backend. PHP saves the uploaded photos inside the `uploads` folder and stores the report details together with the photo paths in the MySQL database.

The admin panel retrieves all submitted disaster reports from the database and displays them as a list. This list shows the user details, disaster type, GeoTag, submitted date, and uploaded photos for each report. The admin can browse the list to review all submitted disaster reports.

## Technologies Used

This project uses HTML, CSS, PHP, MySQL, XAMPP, Git, and GitHub. HTML is used to create the page structure, CSS is used for styling, PHP is used for backend processing, and MySQL is used to store disaster report details. Uploaded photos are saved in the `uploads` folder on the server, while their file paths are stored in the MySQL database. XAMPP is used to run the project locally.

## Database Description

The system uses a MySQL database named `disaster_report`. Inside this database, there is a table named `disaster_reports`. This table stores the report ID, user name, contact number, disaster type, GeoTag, uploaded photo paths, and submission date and time. The actual photos are saved in the `uploads` folder, while only the photo paths are stored in the database.

## Author

Hansadi Kumanayake
