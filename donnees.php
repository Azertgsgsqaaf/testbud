<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 20 CS2 Pro Players - 2025</title>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type ="text/css" href="styles.css">
</head>
<body>
    <?php
        // Appel du bloc Header et du Menu>
        require('header.php');
        ?>
    <main>

        <div class="container">
            <h2>Classement Top 20 HLTV 2025</h2>
            
            <table id="csgoTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Rang</th>
                        <th>Joueur</th>
                        <th>Équipe</th>
                        <th>Nationalité</th>
                        <th>Rôle</th>
                        <th>Arme Préférée</th>
                        <th>Maps Préférées</th>
                        <th>Skin le plus cher</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // 1. Chargement du fichier JSON
                    $json_data = file_get_contents('datas/cs.json');
                    $players = json_decode($json_data, true);

                    // 2. Boucle pour générer les lignes du tableau
                    if (!empty($players)) {
                        foreach ($players as $player) {
                            echo "<tr>";
                            echo "<td>" . $player['classement'] . "</td>";
                            echo "<td><strong>" . $player['joueur'] . "</strong></td>";
                            echo "<td>" . $player['equipe'] . "</td>";
                            echo "<td>" . $player['nationalite'] . "</td>";
                            echo "<td>" . $player['role'] . "</td>";
                            echo "<td>" . $player['arme_preferee'] . "</td>";
                            // On transforme le tableau des maps en une chaîne de caractères
                            echo "<td>" . implode(', ', $player['maps_preferees']) . "</td>";
                            echo "<td>" . $player['skin_le_plus_cher'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                // Initialisation de DataTables
                $('#csgoTable').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                    },
                    "pageLength": 10,
                    "order": [[ 0, "asc" ]], // Tri par défaut sur la colonne Rang
                    "columnDefs": [
                        { "className": "dt-center", "targets": "_all" } // Centre le texte
                    ]
                });
            });
        </script>
    </main>

    <?php
        // Appel du Pied de Page
        require('footer.php');
        ?>

</body>