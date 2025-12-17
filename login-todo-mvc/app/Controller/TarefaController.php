<?php
require_once __DIR__ . '/../Model/Tarefa.php';
require_once __DIR__ . '/ProtectController.php';

class TarefaController{
    private $model;
    public function __construct(){
       
    ProtectController::check();
    $this->model = new Tarefa();

        // Inicia sessão
        if (!isset($_SESSION)) {
            session_start();
        }

        // Proteção: só logados acessam
        if (!isset($_SESSION['id'])) {
            header('Location: index.php');
            exit;
        }

        // Conecta o Model
        $this->model = new Tarefa();
    }

    // Lista tarefas do usuário logado
    public function index(){
        $tarefas = $this->model->listar($_SESSION['id']);
        require __DIR__ . '/../View/PainelView.php';
    }

    // Cria nova tarefa
    public function criar(){
    if (!isset($_SESSION['id'])) {
        die('Sessão sem ID');
    }

    if (empty($_POST['descricao'])) {
        die('Descrição vazia');
    }

    $this->model->criar($_POST['descricao'], $_SESSION['id']);

    header("Location: painel.php");
    exit;
}

    // Exclui tarefa
    public function excluir(){
        if (isset($_GET['id'])) {
            $this->model->excluir($_GET['id'], $_SESSION['id']);
        }

        header('Location: painel.php');
        exit;
    }

    public function editar(){
    if (!isset($_GET['id'])) {
        header("Location: painel.php");
        exit;
    }

    $tarefa = $this->model->buscarPorId($_GET['id'], $_SESSION['id']);
    if (!$tarefa) {
        header("Location: painel.php");
        exit;
    }

    require __DIR__ . '/../View/TarefaEditView.php';
}

public function atualizar(){
    if (!isset($_POST['id']) || empty($_POST['descricao'])) {
        header("Location: painel.php");
        exit;
    }

    $this->model->atualizar(
        $_POST['id'],
        $_POST['descricao'],
        $_SESSION['id']
    );

    header("Location: painel.php");
    exit;
}


}
