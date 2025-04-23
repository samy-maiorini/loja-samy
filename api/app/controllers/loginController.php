<?php
require_once('app/model/userDAO.php');

/**
 * Realiza a autenticação do usuário.
 *
 * @param string $email Email do usuário.
 * @param string $senha Senha do usuário.
 * @return bool Retorna true se a autenticação for bem-sucedida, false caso contrário.
 */
function Authenticator($email, $senha)
{
    if (isset($_SESSION['usuario'])) {
        return true;
    }

    $senhaCripto = hash('sha256', $senha);

    $user = Login($email, $senhaCripto);

    if ($user != null) {
        $_SESSION['usuario'] = $user;
        return true;
    } else {
        return false;
    }
}

/**
 * Realiza o logout do usuário.
 *
 * @return void
 */
function Logout()
{
    unset($_SESSION['usuario']);
}