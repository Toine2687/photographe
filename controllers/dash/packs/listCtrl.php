<?php
$style = 'dash';
$pageTitle = '- Dashboard - Formules';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Pack.php';

$packs = Pack::getAllSimple();

include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/packs/list.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
