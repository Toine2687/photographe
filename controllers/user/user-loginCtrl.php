<?php
$style = 'user';
$pageTitle = ' Interface Client';

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Singleton.php';
require_once __DIR__ . '/../../models/User.php';

try {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // ================= Récupération et Verification mail ==================
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
        if (empty($mail)) {
            $error["mail"] = "L'adresse mail est obligatoire!!";
        } else {
            $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
            if (!$testMail) {
                $error["mail"] = "L'adresse email n'est pas au bon format!!";
            }
        }
        // Identification de l'user à partir de son mail
        $user = User::getByMail($mail);

        // ================= Verification mot de passe ==================
        $password = filter_input(INPUT_POST, 'password');
        // si admin => redirection vers dashboard
        if (!empty($password)) {
            if (password_verify($password, $user->password) && $user->role == 1) {
                header('location: /controllers/dash/dash-indexCtrl.php');
                die;
            }
            // si user standard => redirection vers son espace client
            else if (password_verify($password, $user->password) && $user->role == 0) {
                header('location: /controllers/user/user-boardCtrl.php');
                die;
                // si les login/mdp ne correspondent pas => message
            } else {
                $error["login"] = "Mot de passe éronné";
            }
        } else {
            $error["login"] = "Mot de passe manquant";
        }
    }
}

// ---------NB : Créer une class SessionFlashs dans Helpers-----------

catch (\Throwable $th) {
    var_dump($th);
}

include __DIR__ . '/../../views/users/user-header.php';
include __DIR__ . '/../../views/users/user-login.php';
include __DIR__ . '/../../views/users/user-footer.php';
