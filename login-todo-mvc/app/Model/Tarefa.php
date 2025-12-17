<?php
require_once __DIR__ . '/../Config/Database.php';

class Tarefa{
    private $db;
    public function __construct(){
        // Conecta ao banco uma vez
        $this->db = Database::connect();
    }

     //Lista tarefas do usuário
    
    public function listar($usuarioId){
    $sql = "SELECT * FROM tarefas 
            WHERE usuario_id = $usuarioId
            ORDER BY id DESC";

    $result = $this->db->query($sql);

    // Se não houver tarefas, retorna array vazio
    if (!$result || $result->num_rows === 0) {
        return [];
    }

    return $result->fetch_all(MYSQLI_ASSOC);

    }

    //Cria nova tarefa
    
    public function criar($descricao, $usuarioId){
    $descricao = $this->db->real_escape_string($descricao);

    $sql = "INSERT INTO tarefas (descricao, usuario_id)
            VALUES ('$descricao', $usuarioId)";

    $this->db->query($sql);
}

    
    //Exclui tarefa (somente do dono)
     
    public function excluir($id, $usuarioId){
        $sql = "DELETE FROM tarefas 
                WHERE id = $id AND usuario_id = $usuarioId";

        $this->db->query($sql);
    }

    //Busca tarefa específica (opcional, p/ editar depois)
    
    public function buscarPorId($id, $usuarioId){
        $sql = "SELECT * FROM tarefas 
                WHERE id = $id AND usuario_id = $usuarioId";

        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }

    //Atualiza tarefa 
     
    public function atualizar($id, $descricao, $usuarioId){
        $descricao = $this->db->real_escape_string($descricao);

        $sql = "UPDATE tarefas 
                SET descricao = '$descricao'
                WHERE id = $id AND usuario_id = $usuarioId";

        $this->db->query($sql);
    }

}
