<?php

class LogoutController{
    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Encerra a sessão
        session_destroy();

        // Volta para login
        header('Location: index.php');
        exit;
    }
}
