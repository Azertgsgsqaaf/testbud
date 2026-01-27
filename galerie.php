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
        require('header.php');

        /* 
        Comptage des fichiers (Votre logique actuelle)
        Note: Cela suppose que vos images s'appellent strictement image1.jpg, image2.jpg, etc.
        */
        $nbFichiers = -2; // Compensation pour . et ..
        $dossier = opendir("images/galerie");
        while ($fichier = readdir($dossier)) {
            $nbFichiers++;
        }
        closedir($dossier); // Il est important de fermer le dossier après comptage

        echo '<p>Nous avons : ' . $nbFichiers . ' images.</p>';

        // --- DÉBUT DE LA GALERIE ---
        // On ouvre le conteneur principal AVANT la boucle
        echo '<div class="galerie">';

        $i = 1;
        while ($i <= $nbFichiers) {
            // Pour chaque image, on crée un bloc "item"
            echo '<div class="image-item">';
                // L'image est à l'intérieur de l'item
                echo '<img src="images/galerie/image' . $i . '.jpg" alt="Image numéro ' . $i . '">';
            echo '</div>'; // On ferme le bloc item
            
            $i++;
        }

        // On ferme le conteneur principal APRÈS la boucle
        echo '</div>'; 
    ?>
        <main>
            <form action="traitements/upload_image.php" method="post" enctype="multipart/form-data">
            <label for="image">Choisir un fichier</label>
            <input type="file" name="image" id="image" />
            <input type="submit" value="Télécharger" />
            </form>
            
        </main>

        <?php
        // Appel du Pied de Page
        require('footer.php');
        ?>
    </body>
</html>