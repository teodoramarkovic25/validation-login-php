<?php

session_start();
if(empty($_SESSION["loggedUser"])){
    header("Loacation:login.php");
}

$connection = mysqli_connect("localhost", "root", "", "baza");
if($connection->connect_error){
    die("Connection:".$connection->connect_error);
}

$sql = "SELECT DISTINCT subjects.year FROM subjects INNER JOIN grades ON subjects.ID = grades.subjects_id WHERE grades.user_id = {$_SESSION['loggedUser']['ID']}";
$rezultat = $connection->query($sql);

$years=[];
if($rezultat->num_rows>0){
    while($row = $rezultat->fetch_assoc()){
        $years[]=$row;

    }
}
?>
<html>

<head>

    <title>Ocjene Site - Index</title>
</head>

<body>
<h1>Ocjene sajt</h1>
<p>Welcome<b> <?php echo $_SESSION["loggedUser"]["firstname"]; ?></b>, <a href="logout.php"></a></p>
<label for="year">Godine </label>
<select name = "year" id="year">
    <option value=""></option>
    <?php 
     foreach($years as $year){
echo "<option value ='{$year["year"]}'>{$year["year"]}</option>";

     }?>

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

</body>
</html>



