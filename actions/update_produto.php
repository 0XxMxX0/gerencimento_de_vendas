<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";

if(isset($_POST['btn-editar'])){
    $produto = mysqli_escape_string($connect, $_POST['name']);
    $preco = mysqli_escape_string($connect, $_POST['preco-produto']);
    $id = mysqli_escape_string($connect, $_POST['id']);
    
    $sql = "UPDATE produtos SET Nome = '$produto', Preco = '$preco'
            WHERE ProdutosID = $id; 
    ";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = 'Atualizado com sucesso!';
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar';
        header('Location: ../index.php');
    }
};

include_once "../include/footer.php";
?>