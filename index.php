<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="data:,">
</head>
<body>
    
    <?php
        // Appel du bloc Header et du Menu>
        require('header.php');
        ?>
    
    <section class="hero">
        <canvas></canvas>

        <div class="hero-content">
            <div class="header">
                <h1>Counter-Strike</h1>
            </div>
        </div>
    </section>
    <section class="outro"></section>

    <style>
                :root {
            --fg : #241910;
            --bg : #fefbf4;
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;}

        body{
            font-family: 'Azonix', sans-serif;

        }

        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        h1 {
            font-family: 'Roboto', sans-serif;
            font-size: 100px;
            font-weight: 700;
            line-height: 1.1;
        }

        p {
            text-transform: uppercase;
            font-size: 40px;
            font-weight: 500;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.25rem;
            background-color: var(--bg);
            color: var(--fg)
        }

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
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: rgba(255,255,255,0);
        }
        nav > div {
            flex: 1;
        }

        nav .nav-links {
            flex: 2;
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        nav .nav-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 1.5rem;
        }

        section {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        canvas {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-content {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translateX(-50%);
            transform-style: preserve-3d;
            perspective: 1000px;
            padding: 0.5rem 0;
        }

        .header {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
            text-align: center;
            color: var(--fg);
            transform-origin: center;
            will-change: transform, opacity;
        }
        .header h1 {
            width: 50%;
            margin-bottom: 0.5rem;
        }

        .header p {
            opacity: 0.35;
        }
        .hero-img {
            position: relative;
            width: 100%;
            height: 100%;
            transform: translateZ(1000px);
            opacity: 0;
            will-change: t;
        }

    </style>

    <script type="module" src="script.js"></script>
    <script src="script/gsap.min.js"></script> 
    <script src="script/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/lenis@1.3.17/dist/lenis.min.js"></script> 

    <?php
        // Appel du Pied de Page
        require('footer.php');
        ?>
</body>
</html>