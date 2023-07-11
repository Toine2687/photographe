<?php
$style = 'dash';
$pageTitle = '- Dashboard';


require_once __DIR__ . '/../../models/User.php';


// A SUPPRIMER
// $valoche = User::get(10);
// $password = password_hash('azerty', PASSWORD_DEFAULT);
// $valoche->password = $password;
// var_dump($valoche);
// die;
// A SUPPRIMER

User::checkUser();
User::checkAdmin();


include __DIR__ . '/../../views/dash/dash-header.php';
include __DIR__ . '/../../views/dash/dash-index.php';
include __DIR__ . '/../../views/dash/dash-footer.php';
