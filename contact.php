<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Destinataire de l'email (modifiez cette adresse avec votre adresse email)
    $to = 'contact@exemple.com';

    // Sujet de l'email
    $email_subject = "Nouveau message de contact: $subject";

    // Corps de l'email
    $email_body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";

    // En-têtes de l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoi de l'email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message.";
    }
}
?>
