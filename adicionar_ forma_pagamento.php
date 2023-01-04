<?php
include_once "./include/head.php";
?>
<div>
    <h3>Nova venda</h3>
    <form action="./actions/create.php" method="POST">
        <div>
            <label for="name">Nome do cliente</label>
            <input type="text" name="name" id="name"/>
        </div>
        
        <button type="submit" name="btn-cadastrar">Adicionar forma de pagamento</button>
        <button type="submit">Historico de vendas</button>
    </form>

</div>
<?php
include_once "./include/footer.php";
?>