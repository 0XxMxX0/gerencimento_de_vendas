<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";
include_once "../include/head.php";


if(isset($_POST['btn-cadastrar'])){
    $cliente = mysqli_escape_string($connect, $_POST['name']);
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
                <form method="POST" action="../actions/create_parcelado.php">
                    <input id='name' name="name" type="hidden" value="<?php echo $cliente ?>"/>
                    <input id='produto' name="produto" type="hidden" value="<?php echo $produto  ?>"/>
                    <input id='quantidade-produto' name="quantidade-produto" type="hidden" value="<?php echo $quantidade  ?>"/>
                    <input id='total-venda' name="total-venda" type="hidden" value="<?php echo $totalVenda  ?>"/>
                    <input id='forma-pagamento' name="forma-pagamento" type="hidden" value="<?php echo $formaPagamento  ?>"/>
                    <input id='data-venda' name="data-venda" type="hidden" value="<?php echo $dataVenda  ?>"/>
                    
                    <div class="input-field col s12">
                        <label for="quantidade-parcelas">Quantidades de parcelas</label>
                        <input type='number' name="quantidade-parcelas" id="quantidade-parcelas"/>
                    </div>
                        <a class="btn green" onclick='gerarParcelamento()'>Confirmar Parcelamento</a>
                    <div class="row">
                        <div class="input-field col s12" id='campoParcelamento'></div>
                    </div>
                    <br>
                    <button class="waves-effect waves-light btn-large" type='submit' name="btn-cadastrar">Realizar venda</button>
                </form>
            </div>
        </div>
        <?php
        
    } else {
        
        $sql_nomeCliente = "SELECT * FROM Clientes WHERE Nome = '$cliente'";

        $resultadoNomeCliente = mysqli_query($connect,$sql_nomeCliente);

        if(mysqli_num_rows($resultadoNomeCliente) > 0){

            $campo = mysqli_fetch_array($resultadoNomeCliente);

            $ClienteID = $campo['ClienteID'];

        } else {

            $ClienteID = 'Sem cadastro';
        }

        // $sql_registroID = "SELECT * FROM registro_vendas WHERE Cliente = '$ClienteID'
        // ";
        
        $sql = "INSERT INTO registro_vendas(RegistroID, Cliente, Produto, Quantidade, TotalVenda, FormaPagamento, DataVenda)
            VALUES('','$ClienteID', '$produto', $quantidade, $totalVenda, '$formaPagamento', '$dataVenda');
        ";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem'] = 'Cadastrado com sucesso!';
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao cadastrar';
            // header('Location: ../index.php');
            
        }
    }
    
};

include_once "../include/footer.php";
?>