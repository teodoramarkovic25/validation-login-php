<?php

session_start();

if (!empty($_SESSION["loggedInUser"])) {
    header("Location: index.php");
}

if (isset($_COOKIE["loginFailed"])) {
    setcookie("loginFailed", false);
    include_once "failedLogin.php";
}

if (isset($_COOKIE["LoggedOut"])) {
    setcookie("LoggedOut", false);
    include_once "logout-notification.php";
}

?>

<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login Site</h1>
    <form method="POST" action="validateLogin.php" id="form">
        <label for="username">Username:</label><br />
        <input type="text" id="username" name="username" /><br />
        <label for="password">Password:</label><br />
        <input type="password" name="password" id="password" /><br />
        <button type="button" onclick="checkPassword()">Login</button>
    </form>
    <script src="checkPassword.js"></script>
</body>

</html>