<?php
if (!isset($_SESSION)) session_start();

require_once __DIR__ . '/../Controller/ProtectController.php';
ProtectController::check();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar tarefa</title>
</head>
<body>

<h2>Editar tarefa</h2>

<form method="POST" action="painel.php?action=atualizar">
    <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">

    <p>
        <input type="text" name="descricao"
               value="<?= $tarefa['descricao'] ?>">
    </p>

    <button type="submit">Salvar</button>
</form>

<a href="painel.php">Voltar</a>

</body>
</html>
