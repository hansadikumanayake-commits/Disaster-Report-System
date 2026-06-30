<?php
session_start();
include 'db.php';

// checking whether the user_id is available in the session
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// check whether the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the otp entered by the user
    $entered_otp = $_POST['otp'];

    // get user id from session, not from POST
    $user_id = $_SESSION["user_id"];

    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if ($entered_otp == $user['otp'] && strtotime($user['otp_expiry']) > time()) {

            $_SESSION['admin_logged_in'] = true;

            header("Location: admin.php");
            exit();

        } else {

            header("Location: otp_failed.php");
            exit();
        }

    } else {

        header("Location: login.php");
        exit();
    }

} else {

    header("Location: login.php");
    exit();
}
?>