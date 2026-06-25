<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>User Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>User Login</h1>
        <form action="login_process.php" method="post">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </body>
</html>