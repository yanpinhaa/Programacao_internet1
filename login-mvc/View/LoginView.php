<?php
require_once __DIR__ . '/../Controller/LoginController.php';

$erro = login_controller();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Acesse sua conta</h1>

<?php if ($erro): ?>
    <p style="color:red;"><?= $erro ?></p>
<?php endif; ?>

<form action="" method="POST">
    <p>
        <label>E-mail</label>
        <input type="text" name="email">
    </p>
    <p>
        <label>Senha</label>
        <input type="password" name="senha">
    </p>
    <p>
        <button type="submit">Entrar</button>
    </p>
</form>

</body>
</html>