<?php

/**
 * Estabelece uma conexão com o banco de dados.
 *
 * @return mysqli Conexão com o banco de dados.
 * @throws Exception Caso ocorra um erro na conexão.
 */
function GetConn()
{
    $host = 'localhost';
    $bd = 'loja';
    $usuario = 'root';
    $senha = '';

    $conn = new mysqli($host, $usuario, $senha, $bd);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    return $conn;
}