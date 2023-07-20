<?php

setcookie("LoggedOut", true);
session_start();
session_destroy();
header("Location: login.php");

?>