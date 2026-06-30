<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OTP Verification Failed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="otp-failed-wrapper">

        <div class="otp-failed-card">

            <div class="otp-failed-icon">!</div>

            <h1 class="otp-failed-title">OTP Verification Failed</h1>

            <p class="otp-failed-message">
                The OTP you entered is incorrect or expired.
            </p>

            <p class="otp-failed-question">
                Do you want to generate a new OTP?
            </p>

            <div class="otp-failed-actions">
                <a href="resend_otp.php" class="otp-failed-primary-btn">
                    Generate New OTP
                </a>

                <a href="otp_verify.php" class="otp-failed-secondary-btn">
                    Try Existing OTP Again
                </a>

                <a href="login.php" class="otp-failed-link">
                    Back to Login
                </a>
            </div>

        </div>

    </div>

</body>
</html>