<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musculation_game";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, repetitions FROM scores ORDER BY repetitions DESC";
$result = $conn->query($sql);

$scores = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $scores[] = $row;
    }
}

echo json_encode(['scores' => $scores]);

$conn->close();
?>
