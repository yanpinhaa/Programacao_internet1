<?php
if (!isset($_SESSION)) session_start();
require_once __DIR__ . '/../Controller/ProtectController.php';
ProtectController::check();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>

<h2>Olá, <?= $_SESSION['nome'] ?></h2>

<a href="logout.php">Sair</a>

<hr>

<?php require __DIR__ . '/TarefaListView.php'; ?>

</body>
</html>
