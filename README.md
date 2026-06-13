Disaster Report System

Project Description

The Disaster Report System is a web-based application developed using PHP and MySQL. The main purpose of this system is to allow users to report disaster incidents by submitting their personal details, selecting a disaster type, and uploading disaster-related photos.

This system is designed for disaster situations that may occur in Sri Lanka, such as floods, landslides, animal attacks, storms, heavy rain, drought, fire, tsunami, building collapse, and other emergency incidents.

Main Features

- Submit disaster reports through a client form
- Enter name and contact number
- Select disaster type from a dropdown list
- Upload up to three disaster photos
- Store report details in a MySQL database
- Store uploaded photos in an `uploads` folder
- View all submitted reports in an admin panel
- Open uploaded photos using a View Photos button

How the System Works

The system starts with the client report form. The user enters their name and contact number, selects the disaster type from the dropdown list, and uploads up to three disaster-related photos. After clicking the submit button, the data is sent to the PHP backend. PHP saves the uploaded photos inside the uploads folder and stores the report details together with the photo paths in the MySQL database.

The admin panel saves and organizes all submitted disaster reports in a list retrieved from the database. This list displays the user details, disaster type, and a View Photos button for each report. The admin can browse the list to review all submitted reports. When the admin clicks the View Photos button, the system opens a separate page and displays the photos uploaded for that specific disaster report.

Technologies Used

This project uses HTML, CSS, PHP, MySQL, XAMPP, Git, and GitHub. HTML is used to create the page structure, CSS is used for styling, PHP is used for backend processing, and MySQL is used to store disaster report details. Uploaded photos are saved in the uploads folder on the server, while their file paths are stored in the MySQL database. XAMPP is used to run the project locally.

Database Description

The system uses a MySQL database table named disaster_reports. This table stores the report ID, user name, contact number, disaster type, and uploaded photo paths. The actual photos are saved in the uploads folder, while only the photo paths are stored in the database.

Author
- Hansadi Kumanayake