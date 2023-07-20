<?php

session_start();

if (empty($_SESSION["loggedInUser"])) {
    header("Location: login.php");
}

$connection = mysqli_connect("localhost", "root", "", "ocjene");

if ($connection->connect_error) {
    die("Connection error: " . $connection->connect_error);
}

$sql = "SELECT DISTINCT subjects.year FROM subjects INNER JOIN grades ON subjects.ID = grades.subject_id WHERE grades.user_id = {$_SESSION['loggedInUser']['ID']}";

$result = $connection->query($sql);

$years = [];



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $years[] = $row;
    }
}

?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Ocjene Site - Index</title>
</head>

<body>

    <h1>Ocjene Site</h1>
    <p>Welcome <b><?php echo $_SESSION["loggedInUser"]["firstname"]; ?></b>, <a href="logout.php">Logout</a></p>

    <label for="year">Godina:</label>
    <select name="year" id="year">
        <option value=""></option>
        <?php
        foreach ($years as $year) {
            echo "<option value='{$year["year"]}'>{$year["year"]}</option>";
        }
        ?>
    </select>
    <table>
        <thead>
            <tr>
                <th>Predmet</th>
                <th>Godina</th>
                <th>Ocjena</th>
            </tr>
        </thead>
        <tbody id="result">

        </tbody>
    </table>
    <script src="getData.js"></script>
</body>

</html>