<?php
$style = 'dash';
$pageTitle = '- Dashboard | Galeries';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../models/Gallery.php';

User::checkUser();
User::checkAdmin();

$users = User::getAllSimple();
$galleries = Gallery::getAllSimple();

include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/galleries/list.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
