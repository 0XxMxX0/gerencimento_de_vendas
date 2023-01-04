<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";

if(isset($_POST['btn-cadastrar'])){
    $cliente = mysqli_escape_string($connect, $_POST['name']);
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
    $sql_nomeCliente = "SELECT * FROM Clientes WHERE Nome = '$cliente'";

    $resultadoNomeCliente = mysqli_query($connect,$sql_nomeCliente);

    if(mysqli_num_rows($resultadoNomeCliente) > 0){

        $campo = mysqli_fetch_array($resultadoNomeCliente);

        $ClienteID = $campo['ClienteID'];

    } else {

        $ClienteID = 'Sem cadastro';
    }

    $sql_registroID = "SELECT * FROM registro_vendas WHERE Cliente = '$ClienteID'
    ";

    $sql = "INSERT INTO registro_vendas(RegistroID, Cliente, Produto, Quantidade, TotalVenda, FormaPagamento, DataVenda)
        VALUES('','$ClienteID', '$produto', $quantidade, $totalVenda, '$formaPagamento', '$dataVenda');
    ";


if(mysqli_query($connect, $sql)){
        
        $resultado = mysqli_query($connect, $sql_registroID);

        $dados = mysqli_fetch_array($resultado);

        $registroID = $dados['RegistroID'];

        $i = 0;
        while($i < $quantidadeParcelas){
            $sql_parcelas = "INSERT INTO operacao(OperacaoID, RegistroID, DataVencimento, Valor,Observacao)
            VALUES('', $registroID, '$faturasDatas[$i]', $faturasValor[$i], '$faturasObs[$i]');";
            $i++;
        
            $resultado2 = mysqli_query($connect, $sql_parcelas);
        }

        if($resultado2){
            $_SESSION['mensagem'] = 'Cadastrado com sucesso!';
            header('Location: ../index.php');


        } else {
            $_SESSION['mensagem'] = 'Erro ao cadastrar';
            header('Location: ../index.php');
        }

    }
};

include_once "../include/footer.php";
?>