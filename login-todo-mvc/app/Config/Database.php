<?php

class Database{
    // Método estático para obter a conexão
    public static function connect(){
        // Dados de conexão com o banco
        $host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $database = 'login_todo';

        // Cria a conexão
        $mysqli = new mysqli($host, $usuario, $senha, $database);

        // Verifica erro de conexão
        if ($mysqli->connect_error) {
            die('Erro ao conectar ao banco de dados.');
        }

        // Define charset para evitar problemas com acentos
        $mysqli->set_charset('utf8');

        // Retorna o objeto de conexão
        return $mysqli;
    }
}
