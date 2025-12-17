<?php
require_once __DIR__ . '/../Config/Database.php';

class User{
    
     //Busca um usuário pelo e-mail e senha
     //Retorna array associativo ou null
     
    public function findByCredentials($email, $senha){
        // Conecta ao banco
        $db = Database::connect();

        // Proteção contra caracteres invasivos
        $email = $db->real_escape_string($email);
        $senha = $db->real_escape_string($senha);

        // Consulta usuário
        $sql = "SELECT * FROM usuarios 
                WHERE email = '$email' AND senha = '$senha'";
        $result = $db->query($sql);

        // Se encontrou exatamente 1 usuário, retorna
        if ($result && $result->num_rows === 1) {
            return $result->fetch_assoc();
        }

        // Caso contrário, falha no login
        return null;
    }
}