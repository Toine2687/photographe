<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Antoine Petit - Photographe Mariage Amiens <?= $pageTitle ?? '' ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/assets/img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link rel="stylesheet" href="../../public/assets/css/contact.css">
    <?php
    if (isset($style)) {
        echo '<link rel="stylesheet" href="../../public/assets/css/' . $style . '.css">';
    }
    ?>
</head>

<body>
    <header>
        <nav>
            <a href="/"><img id="logo" src="../../public/assets/img/logo_APP.png" alt="logo photographe amiens"></a>

            <div id="navLinks">
                <ul id="menu">
                    <li class="menuItem"><a href="/controllers/portfolioCtrl.php">Portfolio</a></li>
                    <li class="menuItem"><a href="/controllers/photographeCtrl.php">Photographe</a></li>
                    <li class="menuItem"><a href="/controllers/blogCtrl.php">Journal</a></li>
                    <li class="menuItem"><a href="/controllers/contactCtrl.php">Contact</a></li>
                    <li class="menuItem"><a href="/controllers/clientsCtrl.php">Clients</a></li>
                </ul>
            </div>
            <i id="burger" class="fa-solid fa-bars"></i>
        </nav>
    </header>