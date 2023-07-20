<?php

$connection = mysqli_connect("localhost", "root", "", "ocjene");

if ($connection->connect_error)
{
    die("Connection error: " .$connection->connect_error);
}

$pass = md5($_POST["password"]);

$sql = "SELECT * FROM users WHERE users.username = '{$_POST["username"]}' AND users.password = '{$pass}'";

$result = $connection->query($sql);

if ($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
}

if ($_POST["username"] === $row["username"] && md5($_POST["password"]) === $row["password"])
{
    session_start();
    $_SESSION["loggedInUser"] = $row;
    header("Location: index.php");
}
else
{
    setcookie("loginFailed", true);
    header("Location: login.php");
}

$connection->close();

?>   