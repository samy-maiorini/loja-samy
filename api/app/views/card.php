<?php
require_once('app\model\produtoDAO.php');

// Verificar se há produtos
if ($produtos->num_rows > 0)
{
    while ($produto = $produtos->fetch_assoc())
    {
        echo "<div class='card_product'>";
        echo "<a href='#'></a> <img class='imagem' src='https://www.scuadra.com.br/blog/wp-content/uploads/2021/08/marmita-de-papel.png'>";
        echo "<div class='info'>";
        echo "<b>" . $produto["nome"] . "</b><br><br>";
        echo "<div class='preco'>";
        echo "R$" . number_format($produto["preco"], 2, ",", " ");
        echo "</div>";
        echo "<div class='preco2'>";
        echo "R$" . number_format(($produto["preco"] + 2), 2, ",", " ");
        echo "</div>";
        echo "<div class='lado'>";
        echo "<div class='button'><button type='button'>Comprar</button></div>";
        echo "<div class='button2'><a href='#'><button type='button'>Detalhes</button></a></div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
?>
