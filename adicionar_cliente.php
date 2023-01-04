<?php
include_once "./include/head.php";
?>
<div class="row">
    <div class="col s12 m10 push-m1">
        <h3>Nova venda</h3>
        <form action="./actions/create_cliente.php" method="POST">
            <div class="input-field col s12">
                <label for="name">Nome do cliente</label>
                <input type="text" name="name" id="name"/>
            </div>
            
            <div class="input-field col s12"> 
                <label for="email">Email</label>
                <input type="text" name="email" id="email"/>
            </div>

            <button type="submit" class="waves-effect waves-light btn-large green" name="btn-cadastrar">Cadastrar Cliente </button>
            <a href="historico_clientes.php" class="btn-large" type="submit">Historico de clientes</a>
        </form>
    </div>
</div>
<?php
include_once "./include/footer.php";
?>