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
            <section class="hero">
                <canvas></canvas>

                <div class="hero-content">
                    <div class="header">
                        <h1>annubis</h1>
                    </div>
                </div>
            </section>
            <section class="outro"></section>
            <script type="module" src="script.js"></script>
            <script src="script/gsap.min.js"></script> 
            <script src="script/ScrollTrigger.min.js"></script>
            <script src="https://unpkg.com/lenis@1.3.17/dist/lenis.min.js"></script>
        </main>

        <?php
        // Appel du Pied de Page
        require('footer.php');
        ?>
    </body>
</html>