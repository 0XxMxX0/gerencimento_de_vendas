<?php
include_once "./include/head.php";
?>
<div class="row">
    <div class="col s12 m10 push-m1">
        <h3>Nova produto</h3>
        <form action="./actions/create_produto.php" method="POST">
            <div class="input-field col s12">
                <label for="name">Nome do produto</label>
                <input type="text" name="name" id="name"/>
            </div>
            
            <div class="input-field col s12">
                <label for="email">Preço do produto </label>
                <input type="text" name="preco-produto" id="preco-produto"/>
            </div>

            <button type="submit" class="waves-effect waves-light btn-large green" name="btn-cadastrar">Cadastrar produto</button>
            <a href="historico_produtos.php" class="btn-large" type="submit">Historico de produtos</a>
        </form>
    </div>
</div>
<?php
include_once "./include/footer.php";
?>