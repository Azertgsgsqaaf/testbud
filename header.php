<?php
// On récupère le nom du fichier actuel (ex: index.php)
$current_page = basename($_SERVER['PHP_SELF']);
?>
<header>
    <nav>
        <h1>ACCUEIL</h1>
        <ul class="nav-links">
            <li><a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Accueil</a></li>
            <li><a href="donnees.php" class="<?php echo ($current_page == 'donnees.php') ? 'active' : ''; ?>">Données</a></li>
            <li><a href="galerie.php" class="<?php echo ($current_page == 'galerie.php') ? 'active' : ''; ?>">Galerie</a></li>
            <li><a href="contact.php" class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
            <li><a href="partenaires.php" class="<?php echo ($current_page == 'partenaires.php') ? 'active' : ''; ?>">Partenaires</a></li>
        </ul>
        <div class="container glass"></div>
        <style>
            nav {
            position: fixed;
            width: 100vw;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
            will-change: opacity;
            z-index: 2;
            z-index: 1000;
            background: linear-gradient(135 deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: rgba(255,255,255,0);
            }
        </style>
    </nav>
</header>