<div class="cabecalho2"><h1> Form </h1></div>

<div class="center">

    <div class="card_title">
        <h3>Cadastro</h3>
    </div>

    <div class="card_cad">
        <form action="" method="post">
            <label for="nome">Nome do produto</label><br>
            <input type="text" name="nome" id="nome" value="<?=$produto['nome'] ?? null ?>"><br><br>
            <label for="preco">Preço</label><br>
            <input type="text" name="preco" id="preco" value="<?=$produto['preco'] ?? null ?>"><br><br>
            <label for="descricao">Descrição</label><br>
            <input type="textarea" name="descricao" id="descricao" value="<?=$produto['descricao'] ?? null ?>"></input><br><br>
            <label class=""></label><input type="file" id="img">
            <div class="lado">
                <br><div class="button"><button type="submit">Submeter</button></div>
                <div class="button2"><button type="reset">Limpar</button></div>
            </div>
    </div>
</div>
</form>