// Vérification des données du formulaire

$affichage_retour = '';														// Lignes à ajouter au début des vérifications
$erreurs=0;

// Exemple pour le nom
if (!empty($_POST['nom'])) {
	$nom=$_POST['nom'];
} else {
    // header('location: contact.php'); 									// Ligne à remplacer
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
    // header('location: contact.php'); 									// Ligne à remplacer
    $affichage_retour .='Adresse mail incorrecte<br>';
    $erreurs++;
    }
        
// Si le champ email est vide
} else {
    // header('location: contact.php'); 									// Ligne à remplacer
    $affichage_retour .='Le champ EMAIL est obligatoire<br>';
    $erreurs++;
}