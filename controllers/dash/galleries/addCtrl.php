<?php
$style = 'dash';
$pageTitle = '- Dashboard | Ajout Galerie';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // ---------------- VERIFICATIONS -------------------


        //===================== Titre : Nettoyage et validation =======================
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($title)) {
            $error["title"] = "Vous devez entrer un titre !";
        } else {
            if (strlen($title) <= 2 || strlen($title) >= 100) {
                $error["title"] = "La longueur du titre est incorrecte";
            }
        }

        //===================== shootingDate : Nettoyage et validation =======================
        $shootingDate = filter_input(INPUT_POST, 'shootingDate', FILTER_SANITIZE_NUMBER_INT);
        if (!empty($shootingDate)) {
            $isOk = filter_var($shootingDate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $error["shootingDate"] = "La date entrée n'est pas valide!";
            } else {
                $shootingDateObj = new DateTime($birthdate);
                $age = date('Y') - $shootingDateObj->format('Y');
                if ($age > 10 || $age < -5) {
                    $error["shootingDate"] = "La date est trop éloignée";
                }
            }
        }

        //===================== main_picture : Nettoyage et validation =======================
        if (isset($_FILES['main_picture'])) {
            $main_picture = $_FILES['main_picture'];
            if (!empty($main_picture['tmp_name'])) {
                if ($main_picture['error'] > 0) {
                    $error["main_picture"] = "erreur lors du transfert du fichier";
                } else {
                    if (!in_array($main_picture['type'], AUTHORIZED_IMAGE_FORMAT)) {
                        $error["main_picture"] = "Le format du fichier n'est pas accepté";
                    } else {
                        $extension = pathinfo($main_picture['name'], PATHINFO_EXTENSION);
                        $from = $main_picture['tmp_name'];
                        $fileName = uniqid('img_') . '.' . $extension;
                        $to = __DIR__ . '/..public/uploads/' . $fileName;
                        move_uploaded_file($from, $to);
                    }
                }
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}



include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/galleries/add.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
