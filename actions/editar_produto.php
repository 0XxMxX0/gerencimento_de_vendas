<?php
// CONEXÃO
require_once "../conexao/db_connect.php";
include_once "../include/head.php";
if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT *
            FROM produtos
            WHERE ProdutosID = '$id';
    ";
    $resultado = mysqli_query($connect, $sql);

    $dados = mysqli_fetch_array($resultado);
}
?>
<div class="row">
    <div class="col s12 m10 push-m1">
        <h3>Editar Produto</h3>
        <form action="../actions/update_produto.php" method="POST">
            <input type="hidden" name='id' id='id' value="<?php echo $dados['ProdutosID']; ?>"/>
                
            <div class="input-field col s12">
                    <label for="name">Nome do produto</label>
                    <input type="text" name="name" id="name" value="<?php echo $dados['Nome'] ?>"/>
                </div>
                
                <div class="input-field col s12">
                    <label for="preco-produto">Preço do produto</label>
                    <input type="text" name="preco-produto" id="preco-produto" value="<?php echo $dados['Preco'] ?>"/>
                </div>

            <button type="submit" class="waves-effect waves-light btn-large green" name="btn-editar">Atualizar produto</button>
            <a href="../historico_produtos.php" class="btn-large" >Historico de produtos</a>
        </form>
    </div>
</div>
<?php
include_once "../include/footer.php";
?>