<?php
require_once __DIR__ . '/../Model/UserModel.php';

function login_controller() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (strlen($email) === 0) {
            return "Preencha seu email.";
        }
        if (strlen($senha) === 0) {
            return "Preencha sua senha.";
        }

        $usuario = find_user_by_credentials($email, $senha);

        if ($usuario) {
            if (!isset($_SESSION)) session_start();

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit;
        }

        return "Falha ao logar.";
    }

    return null;
}