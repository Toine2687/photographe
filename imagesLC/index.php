<?php

define('MAXFILESIZE', 1 * 1024 * 1024);

try {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        try {

            if (!isset($_FILES['profile'])) {
                throw new Exception('Le champs profile n\'existe pas');
            }

            if (($_FILES['profile']['error'] != 0)) {
                throw new Exception('Une erreur est survenue');
            }

            if (($_FILES['profile']['type'] != 'image/jpeg')) {
                throw new Exception('Ce fichier n\'est pas au bon format');
            }

            if (($_FILES['profile']['size'] > MAXFILESIZE)) {
                throw new Exception('Ce fichier est trop volumineux');
            }

            // ==============  nommage et déplacement  ==================

            $from = $_FILES['profile']['tmp_name'];
            $extension = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION); // récupération de l'extension
            $filename_orig = uniqid('profile_').'.'.$extension; // sans oublier le point ;)
            $to = $_SERVER['DOCUMENT_ROOT'] . '/public/uplaods/user/'.$filename_orig; // Plus sûr 
            // $to = __DIR__ . '/public/uplaods/user/image.jpg';
            move_uploaded_file($from, $to);


            // ==============  redimensionnement  ==================

            $gdImage_orig = imagecreatefromjpeg($to); 

            // récupération de la taille originale de l'image
            $width_orig = getimagesize($to)[0]; 
            $height_orig = getimagesize($to)[1];

            if ($height > $width){ // portrait
                $width = 300; 
                $height = (int)round($height_orig * $width) / $width_orig; // -1 pour auto
            } else { // paysage
                $height = 300;
                $width = (int)round($width_orig * $height) / $height_orig; // produit en croix, arrondi
            }

            $type = 'IMG_BICUBIC'; // algo de traitement
            $gdImage_scaled = imagescale($gdImage_orig, $width, $height, $type); // fichier vers objet image


            // ==============  recadrage  ==================

            $size = 300;
            $x = ($width/2) - ($size/2);
            $y = ($height/2) - ($size/2);

            $gdImage_croped = imagecrop($gdImage_scaled, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);




            imagejpeg($gdImage_scaled, $to); // opération inverse d'imagescale() => ressource vers fichier





        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form method="post" enctype="multipart/form-data">

        <p><?= $error ?? '' ?></p>

        <label for="profile">Photo de profil</label>
        <input type="file" name="profile" id="profile" required accept="image/jpeg">

        <input type="submit" value="Envoyer">

    </form>


</body>

</html>