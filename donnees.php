<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 20 CS2 Pro Players - 2025</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 20 CS2 Pro Players - 2025</title>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type ="text/css" href="styles.css">

</head>
</head>
<body class="page-donnees">
    <?php require('header.php'); ?>

    <main>
        <div class="container-glow">
            <h2 style="text-align: center; margin-bottom: 20px;">Classement Top 20 HLTV 2025</h2>
            
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
                <tbody></tbody>
            </table>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#csgoTable').DataTable({
                "ajax": {
                    "url": "datas/cs.json",
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "classement" },
                    { "data": "joueur", "render": function(data) { return '<strong>'+data+'</strong>'; } },
                    { "data": "equipe" },
                    { "data": "nationalite" },
                    { "data": "role" },
                    { "data": "arme_preferee" },
                    { "data": "maps_preferees", "render": function(data) { return data.join(', '); } },
                    { "data": "skin_le_plus_cher" }
                ],
                "language": { "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json" },
                "columnDefs": [{ "className": "dt-center", "targets": "_all" }]
            });
        });
    </script>
    <?php require('footer.php'); ?>
</body>
</html>