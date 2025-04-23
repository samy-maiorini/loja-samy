<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cabecalho"><h1>Consultas</h1></div>
    <table cellspacing="0" cellpadding="0" border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if($produtos -> num_rows > 0)
            {
                while($produto = $produtos->fetch_assoc())
                {
                    echo "<tr>";
                        echo "<td>".$produto["ID"]."</td>";
                        echo "<td>".$produto["nome"]."</td>";
                        echo "<td>".$produto["preco"]."</td>";
                        echo "<td>
                        
                        <div class='flex'>
                            <div class='button'><button><a href='".BASE_URL."/produtos/editar/".$produto["ID"]."'> Editar </a></button></div>
                            <div class='button2'><button><a href='".BASE_URL."/produtos/excluir/".$produto["ID"]."'> Excluír </a></button></div>
                        </div>

                            </td>";
                    echo "</tr>";
                }
            }

            else
            {
                echo "<tr> <td colspan='4'> Nada cadastrado <td> <tr>";
            }
            ?>
        </tbody>
    </table>
</html>