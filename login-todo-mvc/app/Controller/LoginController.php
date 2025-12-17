<?php
require_once __DIR__ . '/../Model/User.php';

class LoginController{
    public function authenticate()
    {
        // Só processa se for POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return null;
        }

        // Recebe dados do formulário
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // Validação básica
        if ($email === '') {
            return 'Preencha o e-mail.';
        }

        if ($senha === '') {
            return 'Preencha a senha.';
        }

        // Consulta usuário no Model
        $userModel = new User();
        $usuario = $userModel->findByCredentials($email, $senha);

        // Se usuário existir, cria sessão
        if ($usuario) {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            // Redireciona para o painel
            header('Location: painel.php');
            exit;
        }

        // Falha no login
        return 'E-mail ou senha inválidos.';
    }
}
