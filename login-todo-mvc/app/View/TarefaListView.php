<?php
require_once __DIR__ . '/../Controller/ProtectController.php';
ProtectController::check();

if (!isset($tarefas)) {
    $tarefas = [];
}
?>

<h3>Nova tarefa</h3>

<form method="POST" action="painel.php?action=criar">
    <input type="text" name="descricao">
    <button type="submit">Adicionar</button>
</form>

<h3>Minhas tarefas</h3>

<ul>
<?php foreach ($tarefas as $tarefa): ?>
    <li>
    <?= $tarefa['descricao'] ?>

    <a href="painel.php?action=editar&id=<?= $tarefa['id'] ?>">
        Editar
    </a>

    |
    
    <a href="painel.php?action=excluir&id=<?= $tarefa['id'] ?>">
        Excluir
    </a>
</li>
<?php endforeach; ?>
</ul>
