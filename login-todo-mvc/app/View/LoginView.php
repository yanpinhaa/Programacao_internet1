<?php
require_once __DIR__ . '/../Controller/LoginController.php';

$loginController = new LoginController();
$erro = $loginController->authenticate();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Acessar sistema</h1>

<?php if ($erro): ?>
    <p style="color: red;">
        <?= $erro ?>
    </p>
<?php endif; ?>

<form method="POST">
    <p>
        <label>E-mail:</label><br>
        <input type="text" name="email">
    </p>

    <p>
        <label>Senha:</label><br>
        <input type="password" name="senha">
    </p>

    <button type="submit">Entrar</button>
</form>

</body>
</html>
