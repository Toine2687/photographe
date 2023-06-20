<?php
$style = 'dash';
$pageTitle = '- Détail Client';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/User.php';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
// Récupération du patient cliqué sur list
try {
    $user = User::get($id);
    if (!$user) {
        throw new Exception('Utilisateur introuvable');
    }
} catch (\Throwable $th) {
    // possibilité d'inclure un message d'erreur sur une page dédiée à ranger dans templates
    // penser à inclure le footer etc.
    var_dump($th);
}

include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/clients/detail.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
