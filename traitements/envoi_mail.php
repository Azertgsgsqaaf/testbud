<?php
session_start();

// Initialisation des variables
$affichage_retour = '';
$erreurs = 0;

// 1. Vérification du Prénom
if (!empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
} else {
    $affichage_retour .= 'Le champ PRÉNOM est obligatoire.<br>';
    $erreurs++;
}

// 2. Vérification du Nom
if (!empty($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
} else {
    $affichage_retour .= 'Le champ NOM est obligatoire.<br>';
    $erreurs++;
}

// 3. Vérification de l'Email
if (!empty($_POST['email'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        $affichage_retour .= 'L\'adresse mail est incorrecte.<br>';
        $erreurs++;
    }
} else {
    $affichage_retour .= 'Le champ EMAIL est obligatoire.<br>';
    $erreurs++;
}

// 4. Vérification du Message
if (!empty($_POST['message'])) {
    $message_contenu = htmlspecialchars($_POST['message']);
} else {
    $affichage_retour .= 'Le champ MESSAGE est obligatoire.<br>';
    $erreurs++;
}

// Si aucune erreur, on tente l'envoi
if ($erreurs == 0) {
    $email_dest = "ton-email@domaine.fr"; // Remplace par ton vrai mail
    $subject = "Nouveau contact de $prenom $nom";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/html; charset=utf-8";
    
    $corps_mail = "Nom : $nom <br> Prénom : $prenom <br> Message : <br> $message_contenu";

    if (mail($email_dest, $subject, $corps_mail, $headers)) {
        $affichage_retour = "Votre demande a bien été envoyée !";
    } else {
        $affichage_retour = "Échec de l'envoi du message. Veuillez réessayer plus tard.";
    }
}

// On stocke le message final en session et on redirige vers contact.php
$_SESSION['information'] = $affichage_retour;
header('Location: ../contact.php');
exit();
?>