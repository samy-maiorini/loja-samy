<?php
require_once('app/database/connection.php');

/**
 * Realiza o login do usuário.
 *
 * @param string $email Email do usuário.
 * @param string $senha Senha do usuário.
 * @return array|null Dados do usuário ou null se não encontrado.
 */
function Login($email, $senha)
{
    $conn = GetConn();

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ? LIMIT 1");
    $stmt->bind_param('ss', $email, $senha);
    $stmt->execute();

    $user = $stmt->get_result()->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $user;
}