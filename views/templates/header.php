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
    <link href="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../public/assets/css/base.css">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link rel="stylesheet" href="../../public/assets/css/contact.css">

    <?php
    if (isset($style)) {
        echo '<link rel="stylesheet" href="../../public/assets/css/' . $style . '.css">';
    }
    ?>
</head>

<body data-scroll-container>
    <header>
        <?php include __DIR__ . '/navBar.php'; ?>
    </header>
    <div data-scroll-section>