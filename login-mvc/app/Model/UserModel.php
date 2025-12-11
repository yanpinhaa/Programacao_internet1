<?php
require_once __DIR__ . '/../Config/Database.php';

class User
{
    public function findByCredentials($email, $senha)
    {
        $db = Database::connect();

        $email = $db->real_escape_string($email);
        $senha = $db->real_escape_string($senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $result = $db->query($sql);

        return $result->num_rows === 1 ? $result->fetch_assoc() : null;
    }
}