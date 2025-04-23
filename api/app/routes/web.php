<?php

require_once('app/model/produtoDAO.php');
require_once('app/controllers/loginController.php');

// Rotas
if (isset($_SESSION['usuario'])) { // Rotas autenticadas
    if ($recurso === '' && $metodo === 'GET') {
        require_once('app/views/home.php');
        require_once('app/model/userDAO.php');
        require_once('app/model/produtoDAO.php');

        $produtos = SelectAll();

        echo "<div class='container'>";
        require_once('app/views/card.php');
        echo "</div>";
    } else if ($recurso === 'produtos' && $acao === '' && $metodo === 'GET') {
        $produtos = SelectAll();
        require_once('app/views/table.php');
    } else if ($recurso === 'produtos' && $acao === 'novo' && $metodo === 'GET') {
        require_once('app/views/form.php');
    } else if ($recurso === 'produtos' && $acao === 'novo' && $metodo === 'POST') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $image = $_POST['img'];

        Create($nome, $descricao, $preco, $image);

        header('Location: ' . BASE_URL . '/produtos');
    } else if ($recurso === 'produtos' && $acao === 'editar' && $metodo === 'GET') {
        $produto = SelectProduct($id);
        require_once('app/views/form.php');
    } else if ($recurso === 'produtos' && $acao === 'editar' && $metodo === 'POST') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];

        UpdateProduct($id, $nome, $descricao, $preco);

        header('Location: ' . BASE_URL . '/produtos');
    } else if ($recurso === 'produtos' && $acao === 'excluir' && $metodo === 'GET') {
        DeleteProduct($id);

        header('Location: ' . BASE_URL . '/produtos');
    } else if ($recurso === 'logout' && $metodo === 'GET') {
        unset($_SESSION['usuario']);
        header('Location: ' . BASE_URL . '/login');
    } else {
        http_response_code(404);
        require_once('app/views/404.php');
    }
} else { // Rotas livres
    if ($recurso === '' && $metodo === 'GET') {
        require_once('app/views/home.php');

        // Buscar produtos para exibição
        require_once('app/model/produtoDAO.php');
        $produtos = SelectAll();

        echo "<div class='container'>";
        require_once('app/views/card.php');
        echo "</div>";
    } elseif ($recurso === 'login' && $metodo === 'GET') {
        require_once('app/views/login.php');
    } elseif ($recurso === 'login' && $metodo === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (Authenticator($email, $senha)) {
            header('Location: ' . BASE_URL . '/produtos');
        } else {
            header('Location: ' . BASE_URL . '/login');
        }
    } else {
        http_response_code(403);
        echo "<h1>Usuário não autorizado</h1>";
    }
}

// Rotas
// GET  /                       <- Página inicial
// GET  /produtos               <- exibe produtos
// GET  /produtos/novo          <- página novo produto
// GET  /produto/editar/{id}    <- página para editar
// POST /produto/excluir/{id}   <- excluir produto
// POST /produto/editar/{id}    <- editar produto
// POST /produto/novo/          <- novo produto
