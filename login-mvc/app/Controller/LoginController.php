<?php
require_once __DIR__ . '/../Model/UserModel.php';

class LoginController
{
    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return null;
        }

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if ($email === '') return "Preencha o email.";
        if ($senha === '') return "Preencha a senha.";

        $userModel = new User();
        $usuario = $userModel->findByCredentials($email, $senha);

        if ($usuario) {
            if (!isset($_SESSION)) session_start();

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit;
        }

        return "Falha ao logar.";
    }
}
