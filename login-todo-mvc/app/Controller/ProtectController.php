<?php

class ProtectController{
    public static function check()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['id'])) {
            header("Location: ../../index.php");
            exit;
        }
    }
}
