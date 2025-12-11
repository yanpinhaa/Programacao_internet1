<?php

class Database
{
    public static function connect()
    {
        $host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $database = 'login';

        $mysqli = new mysqli($host, $usuario, $senha, $database);

        if ($mysqli->connect_error) {
            die("Erro na conexão com o banco.");
        }

        return $mysqli;
    }
}