<?php
// CONEXÃO
require_once "../conexao/db_connect.php";
include_once "../include/head.php";
if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT *
            FROM registro_vendas 
            WHERE RegistroID = '$id';
    ";
    $resultado = mysqli_query($connect, $sql);

    $dados = mysqli_fetch_array($resultado);
}
?>
<div>
    <h3>Editar venda</h3>
    <form action="../actions/update.php" method="POST">
        <input type="hidden" name='id' id='id' value="<?php echo $dados['RegistroID']; ?>"
        <div>
            <label for="name">Nome do cliente</label>
            <input type="text" name="name" id="name" value="<?php echo $dados['Cliente'] ?>"/>
        </div>
        
        <div>
            <label for="produto">Nome do produto</label>
            <input type="text" name="produto" id="produto" value="<?php echo $dados['Produto'] ?>"/>
        </div>

        <div>
            <label for="quantidade-produto">Quantidades</label>
            <input type="number" name="quantidade-produto" id="quantidade-produto"value="<?php echo $dados['Quantidade'] ?>"/>
        </div>

        <div>
            <label for="total-venda">Total da venda</label>
            <input type="number" name="total-venda" id="total-venda" value="<?php echo $dados['TotalVenda'] ?>"/>
        </div>

        <div>
            <label for="forma-pagamento">Forma de pagamento</label>
            <input type="text" name="forma-pagamento" id="forma-pagamento" value="<?php echo $dados['FormaPagamento'] ?>"/>
        </div>

        <div>
            <label for="data-venda">Data da venda</label>
            <input type="date" name="data-venda" id="data-venda" value="<?php echo $dados['DataVenda'] ?>"/>
        </div>

        <button type="submit" name="btn-editar">Atualizar venda</button>
        <a href="../index.php">Historico de vendas</a>
    </form>

</div>
<?php
include_once "../include/footer.php";
?>