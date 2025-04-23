<?php
require_once('app/database/connection.php');

/**
 * Insere um novo produto no banco de dados.
 *
 * @param string $nome Nome do produto.
 * @param string $descricao Descrição do produto.
 * @param float $preco Preço do produto.
 * @param string $image URL da imagem do produto.
 * @return void
 */
function Create($nome, $descricao, $preco, $image)
{
    $conn = GetConn();

    $stmt = $conn->prepare("INSERT INTO produto(nome, descricao, preco, imagem) VALUES(?,?,?,?)");
    $stmt->bind_param('ssds', $nome, $descricao, $preco, $image);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

/**
 * Seleciona todos os produtos do banco de dados.
 *
 * @return mysqli_result Resultado da consulta.
 */
function SelectAll()
{
    $conn = GetConn();

    $sql = "SELECT * FROM produto";

    $result = $conn->query($sql);

    return $result;
}

/**
 * Seleciona um produto específico pelo ID.
 *
 * @param int $id ID do produto.
 * @return array|null Dados do produto ou null se não encontrado.
 */
function SelectProduct($id)
{
    $conn = GetConn();

    $stmt = $conn->prepare("SELECT * FROM produto WHERE ID = ? LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $product = $stmt->get_result()->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $product;
}

/**
 * Atualiza os dados de um produto.
 *
 * @param int $id ID do produto.
 * @param string $nome Nome do produto.
 * @param string $descricao Descrição do produto.
 * @param float $preco Preço do produto.
 * @return void
 */
function UpdateProduct($id, $nome, $descricao, $preco)
{
    $conn = GetConn();

    $stmt = $conn->prepare("UPDATE produto SET nome=?, descricao=?, preco=? WHERE ID=?");
    $stmt->bind_param('ssdi', $nome, $descricao, $preco, $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

/**
 * Exclui um produto pelo ID.
 *
 * @param int $id ID do produto.
 * @return void
 */
function DeleteProduct($id)
{
    $conn = GetConn();

    $stmt = $conn->prepare("DELETE FROM produto WHERE ID=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}