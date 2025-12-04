<?php
require_once __DIR__ . '/../Config/Database.php';

function find_user_by_credentials($email, $senha) {
    $db = db_connect();

    $email = $db->real_escape_string($email);
    $senha = $db->real_escape_string($senha);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $db->query($sql);

    if ($result->num_rows === 1) {
        return $result->fetch_assoc();
    }

    return null;
}