<?php
$style = 'dash';
$pageTitle = '- Détail Article';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../models/Article.php';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$article = Article::get($id);

include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/articles/detail.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
