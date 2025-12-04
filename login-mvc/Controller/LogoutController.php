<?php
function logout_controller() {
    if (!isset($_SESSION)) session_start();

    session_destroy();
    header("Location: index.php");
    exit;
}