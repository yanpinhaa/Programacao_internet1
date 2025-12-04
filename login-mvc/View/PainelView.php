<?php
require_once __DIR__ . '/../Controller/ProtectController.php';
protect_controller();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>

Bem-vindo ao painel, <?= $_SESSION['nome'] ?>!

<p><a href="logout.php">Sair</a></p>

</body>
</html>
