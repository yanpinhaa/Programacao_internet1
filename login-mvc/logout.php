<?php
require_once __DIR__ . '/app/Controller/LogoutController.php';

$logout = new LogoutController();
$logout->logout();