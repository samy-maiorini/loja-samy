<?php         
        //configurações
        require_once('app/config/config.php');
        session_start();
?>

<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>\public\css\style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    


<body>
<div class="cabecalho">

    <div class="a">
<a href="/aula09_bd">|Início|</a>





<?php

if(isset($_SESSION['usuario']))
{
echo "<a href=" . BASE_URL . "/produtos>Produtos</a>|";
echo "<a href=" .  BASE_URL . "/produtos/novo>Novo</a>|";
}
    if(isset($_SESSION['usuario']))
    {?>
        <nav class='menu'>

        <ul>
            <li class='item'>
                <a href='<?=BASE_URL?>\logout'>
                    <span class='icon'>
                    <i class='bi bi-person-fill'></i></span>
                    <span class='txt-link'>Logout</span>
                </a>
            </li>
        </ul>
    </nav><?php
    }
    else
    {?>
        <nav class='menu'>

        <ul>
            <li class='item'>
                <a href='<?=BASE_URL?>\login'>
                    <span class='icon'>
                    <i class='bi bi-person-fill'></i></span>
                    <span class='txt-link'>Login</span>
                </a>
            </li>
        </ul>
    </nav><?php }

?>
    </div>
    



</div>
    <?php

        //rotas
        require_once('app/routes/web.php');
    ?>

</body>
</html>
