<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";
include_once "../include/head.php";

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
         <div class="row">
            <div class="col s12 m9 push-m1">
                <h3 class="light">Parcelamento da compra</h3>
                <form method="POST" action="../actions/update_parcelado.php">
                    <input id='name' name="name" type="hidden" value="<?php echo $cliente  ?>"/>
                    <input id='produto' name="produto" type="hidden" value="<?php echo $produto  ?>"/>
                    <input id='quantidade-produto' name="quantidade-produto" type="hidden" value="<?php echo $quantidade  ?>"/>
                    <input id='total-venda' name="total-venda" type="hidden" value="<?php echo $totalVenda  ?>"/>
                    <input id='forma-pagamento' name="forma-pagamento" type="hidden" value="<?php echo $formaPagamento  ?>"/>
                    <input id='data-venda' name="data-venda" type="hidden" value="<?php echo $dataVenda  ?>"/>
                    <input id='id' name="id" type="hidden" value="<?php echo $id  ?>"/>
                    
                    <div class="input-field col s12">
                        <label for="quantidade-parcelas">Quantidades de parcelas</label>
                        <input type='number' name="quantidade-parcelas" id="quantidade-parcelas"/>
                    </div>
                    <a onclick='gerarParcelamento()' class="btn green">Confirmar Parcelamento</a>
                    <div class="row">
                        <div id='campoParcelamento' class="input-field col s12"></div>
                    </div>
                    
                    <button type='submit' class="waves-effect waves-light btn-large" name="btn-cadastrar">Atualizar venda</button>
                </form>
            </div>
        </div>
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