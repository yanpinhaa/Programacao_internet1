<?php
require_once __DIR__ . '/app/Controller/TarefaController.php';

$controller = new TarefaController();

// Define a ação (rota)
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'criar':
        $controller->criar();
        break;

    case 'excluir':
        $controller->excluir();
        break;

    case 'editar':
        $controller->editar();
        break;

    case 'atualizar':
        $controller->atualizar();
        break;

    default:
        $controller->index();
}

