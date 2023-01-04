<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";

if(isset($_POST['btn-editar'])){
    $cliente = mysqli_escape_string($connect, $_POST['name']);
    $id = mysqli_escape_string($connect, $_POST['id']);
    $produto= mysqli_escape_string($connect, $_POST['produto']);
    $quantidade = mysqli_escape_string($connect, $_POST['quantidade-produto']);
    $totalVenda = mysqli_escape_string($connect, $_POST['total-venda']);
    $formaPagamento = mysqli_escape_string($connect, $_POST['forma-pagamento']);
    $dataVenda = mysqli_escape_string($connect, $_POST['data-venda']);
    if($formaPagamento == 'Credito'){
        ?>
        <form method="POST" action="../actions/update_parcelado.php">
            <input id='name' name="name" type="hidden" value="<?php echo $cliente  ?>"/>
            <input id='produto' name="produto" type="hidden" value="<?php echo $produto  ?>"/>
            <input id='quantidade-produto' name="quantidade-produto" type="hidden" value="<?php echo $quantidade  ?>"/>
            <input id='total-venda' name="total-venda" type="hidden" value="<?php echo $totalVenda  ?>"/>
            <input id='forma-pagamento' name="forma-pagamento" type="hidden" value="<?php echo $formaPagamento  ?>"/>
            <input id='data-venda' name="data-venda" type="hidden" value="<?php echo $dataVenda  ?>"/>
            <input id='id' name="id" type="hidden" value="<?php echo $id  ?>"/>

            <label for="quantidade-parcelas">Quantidades de parcelas</label>
            <input type='number' name="quantidade-parcelas" id="quantidade-parcelas"/>
            <a onclick='gerarParcelamento()'>Confirmar Parcelamento</a>

            <div id='campoParcelamento'></div>
            <button type='submit' name="btn-cadastrar">Atualizar venda</button>
        </form>
        <?php
        
    } else {
        $sql = "UPDATE registro_vendas SET Cliente = '$cliente', Produto = '$produto', Quantidade = $quantidade, TotalVenda = $totalVenda, FormaPagamento = '$formaPagamento', DataVenda = '$dataVenda'
                WHERE RegistroID = '$id'; 
        ";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem'] = 'Atualizado com sucesso!';
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar';
            // header('Location: ../index.php');
            var_dump($sql);
        }
    }
};

include_once "../include/footer.php";
?>