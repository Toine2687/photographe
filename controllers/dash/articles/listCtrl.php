<?php
$style = 'dash';
$pageTitle = '- Dashboard - Articles';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../models/Article.php';

$users = User::getAllSimple();
$articles = Article::getAllSimple();

include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/articles/list.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
