<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Contact - Counter-Strike</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="page-contact">

    <?php require('header.php'); ?>

    <main>
        <div class="contact-container">
            <h2>Contactez-nous</h2>
            
            <?php if (isset($_SESSION['information']) && !empty($_SESSION['information'])): ?>
                <div class="info-msg">
                    <?php 
                        echo $_SESSION['information']; 
                        unset($_SESSION['information']); // On vide le message après affichage
                    ?>
                </div>
            <?php endif; ?>

            <form action="traitements/envoi_mail.php" method="POST">
                <div id="en-tete">
                    <div class="input-group">
                        <label for="prenom">Prénom <span>*</span></label>
                        <input type="text" name="prenom" id="prenom" required />
                    </div>
                    <div class="input-group">
                        <label for="nom">Nom <span>*</span></label>
                        <input type="text" name="nom" id="nom" required />
                    </div>
                </div>
                
                <div id="bas">
                    <div class="input-group">
                        <label for="email">E-mail <span>*</span></label>
                        <input type="email" name="email" id="email" placeholder="nom@domaine.fr" required />
                    </div>
                    <div class="input-group">
                        <label for="message">Message <span>*</span></label>
                        <textarea name="message" id="message" placeholder="Votre message" rows="5" required></textarea>
                    </div>
                </div>
                
                <button id="button" type="submit">Envoyer le message</button>
            </form>
        </div>
    </main>

    <?php require('footer.php'); ?>
</body>
</html>