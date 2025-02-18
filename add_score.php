<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musculation_game";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$repetitions = $_POST['repetitions'];

$sql = "INSERT INTO scores (name, repetitions) VALUES ('$name', $repetitions)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
