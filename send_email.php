<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $data = json_decode(file_get_contents('php://input'), true);
    $pseudo = $data['pseudo'];
    $username = $data['username'];
    $email = $data['email'];
    $improvement = $data['improvement'];

    // Adresse e-mail de destination
    $to = 'levasseurcyprien1@gmail.com';
    $subject = 'Demande d\'amélioration de programme';
    $message = "Pseudo: $pseudo\nNom: $username\nEmail: $email\n\nDescription de l'amélioration:\n$improvement";
    $headers = "From: $email";

    // Envoyer l'e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'envoi de l\'e-mail.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Méthode de requête invalide.']);
}
?>
