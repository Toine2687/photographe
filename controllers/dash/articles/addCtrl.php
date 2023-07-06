<?php
$style = 'dash';
$pageTitle = '- Dashboard - Ajout Article';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Article.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../models/Sort.php';

User::checkUser();
User::checkAdmin();
$users = User::getAllSimple();
$categories = Category::getAllSimple();

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // ---------------- VERIFICATIONS -------------------

        // ==================== Catégories : Nettoyage ================================
        if (!empty($_POST['category'])) {
            $selectedCat = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
        }
        // var_dump($selectedCat);
        // die;

        //===================== Titre de l'article : Nettoyage  =======================
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($title)) {
            $error["title"] = "Vous devez entrer un titre !";
        }

        //===================== main_picture : Nettoyage et validation =======================
        if (isset($_FILES['main_picture'])) {
            // var_dump('Coucou');
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
                        $fileName = uniqid('img_art_') . '.' . $extension;
                        $to = '../../../public/uploads/articles/' . $fileName;
                        move_uploaded_file($from, $to);
                    }
                }
            }
        }

        //===================== Contenu : Nettoyage et validation =======================
        $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));

        //===================== Description : Nettoyage et validation =======================
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));

        // ==== Id Admin : Nettoyage et validation===
        $users_id = (filter_input(INPUT_POST, "users_id",  FILTER_SANITIZE_NUMBER_INT));
        if (empty($users_id)) {
            $error['id'] = 'Précisez l\'identité de l\'utilisateur';
        } else {
            $isExist = User::get($users_id);
            if (!$isExist) {
                $error['id'] = 'Identité de l\'utilisateur incohérente';
            }
        }



        if (empty($error)) {
            try {
                $instance = Singleton::getInstance();
                $db = $instance->sConnect();
                $db->beginTransaction();


                if (Article::isExist($title) == NULL) {
                    $article = new Article($title, $description, $content, $fileName, $users_id);
                    $isAdded = $article->add();
                    if ($isAdded) {
                        $msg['add'] = '👍 Article ajouté';
                    }
                } else {
                    $msg['add'] = 'Erreur pendant l\'ajout';
                }

                $articles_id = $db->lastInsertId();

                foreach ($selectedCat as $cat) {
                    $sort = new Sort($articles_id, $cat);
                    $isAdded = $sort->add();
                }
                $db->commit();
            } catch (\PDOException $e) {
                $db->rollBack();
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}


include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/articles/add.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
