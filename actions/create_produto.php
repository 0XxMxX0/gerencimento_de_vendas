<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";

if(isset($_POST['btn-cadastrar'])){
    $produto = mysqli_escape_string($connect, $_POST['name']);
    $precoProduto = mysqli_escape_string($connect, $_POST['preco-produto']);
    
    $sql = "INSERT INTO produtos(ProdutosID, Nome, Preco)
            VALUES('', '$produto', $precoProduto);
    ";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = 'Cadastrado com sucesso!';
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = 'Erro ao cadastrar';
        // header('Location: ../index.php');
        var_dump($sql);
    }
};

include_once "../include/footer.php";
?>