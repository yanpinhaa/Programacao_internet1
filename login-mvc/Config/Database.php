<?php

function db_connect() {
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $database = 'login';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if ($mysqli->connect_error) {
        die("Erro ao conectar ao banco de dados.");
    }

    return $mysqli;
}