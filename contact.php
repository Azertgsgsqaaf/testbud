<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>ACCUEIL</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.6/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" type ="text/css" href="styles.css">
</head>
    <body>

        <?php
        // Appel du bloc Header et du Menu>
        require('header.php');
        ?>

        <main>
            <?php
                if (isset($_SESSION['information'])) {
                echo '<p>'.$_SESSION['information'].'</p>'."\n";
                session_unset();
                }
            ?>
            <form action="traitements/envoi_mail.php" method="POST">
                <div id="en-tete">
                    <div>
                        <label for="prenom">Prénom <span>*</span></label>
                        <input type="text" name="prenom" id="prenom" />
                    </div>
                    <div>
                        <label for="nom">Nom <span>*</span></label>
                        <input type="text" name="nom" id="nom" />
                    </div>
                </div>
                <div id="bas">
                    <div>
                        <label for="email">E-mail <span>*</span></label>
                        <input type="email" name="email" id="email" placeholder="nom@domaine.fr" />
                    </div>
                    <div>
                        <label for="message">Message <span>*</span></label>
                        <input type="message" name="message" id="message" placeholder="Votre message"></textarea>
                    </div>
                <button id="button" type="submit" value="Envoyer" />
            </form>
        </main>

        <?php
        // Appel du Pied de Page
        require('footer.php');
        ?>
    </body>
</html>