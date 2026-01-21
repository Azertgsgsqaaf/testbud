<?php
session_start();
$_SESSION['information']='';

// Vérification des données du formulaire

$affichage_retour = '';														// Lignes à ajouter au début des vérifications
$erreurs=0;

// Exemple pour le nom
if (!empty($_POST['nom'])) {
	$nom=$_POST['nom'];
} else {
    $affichage_retour .='Le champ NOM est obligatoire<br>';
    $erreurs++;
}


// Exemple pour l'adresse mail
if (!empty($_POST['email'])) {
// Si le champ email contient des données
  
  	// Verification du format de l'email
  	if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
      $email=$_POST['email'];
    } else {
    // Si l'email est incorrect 
     								
    $affichage_retour .='Adresse mail incorrecte<br>';
    $erreurs++;
    }
        
// Si le champ email est vide
} else {
    $affichage_retour .='Le champ EMAIL est obligatoire<br>';
    $erreurs++;

	if ($erreurs == 0) {

  // Préparation des données 
  //Envoi du mail de contact)
  if (mail($email_dest,$subject,$message,$headers)) {
  $erreurs=0;
  } else {
  $erreurs++;
  }
  
  // Préparation des données pour la confirmation
  //Envoi du mail de confirmation
  if (mail($email_dest,$subject,$message,$headers)) {
  $erreurs=0;
  } else {
  $erreurs++;
  }
  
  // Détermination du message à affichée après les tentatives d'envoi
  	$affichage_retour='Votre demande à bien été envoyée';
    
  	if ($erreurs != 0) {
    $affichage_retour='Echec de l\'envoi du message';
    }
}

	$_SESSION['information']=$affichage_retour;
	header('location: contact.php');
}