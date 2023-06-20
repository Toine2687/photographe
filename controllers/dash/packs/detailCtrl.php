<?php
$style = 'dash';
$pageTitle = '- Détail Formule';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Pack.php';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
// Récupération de la formule cliquée sur list
try {
    $pack = Pack::get($id);
    if (!$pack) {
        throw new Exception('Formule introuvable');
    }
} catch (\Throwable $th) {
    // possibilité d'inclure un message d'erreur sur une page dédiée à ranger dans templates
    var_dump($th);
}


include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/packs/detail.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
