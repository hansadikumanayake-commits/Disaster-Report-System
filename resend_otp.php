<?php
session_start();
include 'db.php';

// Check whether user_id is available in session
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Get user id from session
$user_id = $_SESSION["user_id"];

// Generate new 6 digit OTP
$otp = random_int(100000, 999999);

// OTP valid for 5 minutes
$otp_expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));

// Save new OTP and expiry time in users table
$sql = "UPDATE users 
        SET otp='$otp', otp_expiry='$otp_expiry'
        WHERE id='$user_id'";

$result = mysqli_query($conn, $sql);

// If OTP updated successfully
if ($result) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New OTP Generated</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="otp-container">
        <h1>New OTP Generated</h1>

        <p class="otp-message">Your new OTP is:</p>

        <div class="otp-box">
            <?php echo $otp; ?>
        </div>

        <a href="otp_verify.php" class="otp-button">Enter OTP</a>
    </div>

</body>
</html>

<?php
} else {
    echo "Failed to generate new OTP. Please try again.";
}
?>