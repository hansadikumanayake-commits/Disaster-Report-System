<!DOCTYPE HTML>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <title>Disaster-Report-System</title>
            <!--link to the external css file of the form -->
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <!--Send the form data in a way that can include files/photos and the form data to submit.php-->
            <form action="submit.php" method="POST" enctype="multipart/form-data">
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


            <label>GeoTag:<label>
            <input type="text" name="geotag" placeholder="Example:Colombo,79.861244" required><br>

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
        </body>

</html>