<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";

if(isset($_POST['btn-cadastrar'])){
    $cliente = mysqli_escape_string($connect, $_POST['name']);
    $id = mysqli_escape_string($connect, $_POST['id']);
    $produto= mysqli_escape_string($connect, $_POST['produto']);
    $quantidade = mysqli_escape_string($connect, $_POST['quantidade-produto']);
    $totalVenda = mysqli_escape_string($connect, $_POST['total-venda']);
    $formaPagamento = mysqli_escape_string($connect, $_POST['forma-pagamento']);
    $dataVenda = mysqli_escape_string($connect, $_POST['data-venda']);

    $dataFatura = mysqli_escape_string($connect, $_POST['data-venda']);
    $fatura = mysqli_escape_string($connect, $_POST['data-venda']);
    $obsFatura = mysqli_escape_string($connect, $_POST['data-venda']);
    $quantidadeParcelas = mysqli_escape_string($connect, $_POST['quantidade-parcelas']); 
    $i = 0;
    $faturasDatas = [];
    $faturasValor = [];
    $faturasObs = [];
    while($i < $quantidadeParcelas){
        
        $faturasDatas[] = mysqli_escape_string($connect, $_POST["parcelaDate$i"]);
        $faturasValor[] = mysqli_escape_string($connect, $_POST["parcela$i"]);
        $faturasObs[] = mysqli_escape_string($connect, $_POST["parcelaObs$i"]);

        $i++;
    }
    

    $sql = "UPDATE registro_vendas SET Cliente = '$cliente', Produto = '$produto', Quantidade = $quantidade, TotalVenda = $totalVenda, FormaPagamento = '$formaPagamento', DataVenda = '$dataVenda'
            WHERE RegistroID = '$id';
    ";


    if(mysqli_query($connect, $sql)){

        

        $i = 0;
        while($i < $quantidadeParcelas){
            $sql_parcelas = "UPDATE operacao SET DataVencimento = '$faturasDatas[$i]', Valor = $faturasValor[$i],  Observacao = '$faturasObs[$i]'
                             WHERE RegistroID = '$id';
            ";
            $i++;

            $resultado2 = mysqli_query($connect, $sql_parcelas);
        }

        if($resultado2){
            $_SESSION['mensagem'] = 'Venda atualiza com sucesso!';
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar';
            header('Location: ../index.php');
        }

    }
};

include_once "../include/footer.php";
?>