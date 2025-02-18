<?php
include 'config.php';

// Ajouter un avis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $avatar = $_POST['avatar'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
    $user_id = 1; // Remplacez par l'ID de l'utilisateur actuel

    $stmt = $conn->prepare("INSERT INTO reviews (user_id, avatar, name, comment, rating) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $user_id, $avatar, $name, $comment, $rating);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
}

// Récupérer tous les avis
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = $conn->query("SELECT * FROM reviews");

    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }

    echo json_encode($reviews);
}

$conn->close();
?>
