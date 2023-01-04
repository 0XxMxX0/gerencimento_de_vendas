<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";

if(isset($_POST['btn-cadastrar'])){
    $cliente = mysqli_escape_string($connect, $_POST['name']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    
    $sql = "INSERT INTO clientes(ClienteID, Nome, Email)
            VALUES('', '$cliente', '$email');
    ";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = 'Cadastrado com sucesso!';
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = 'Erro ao cadastrar';
        header('Location: ../index.php');
    }
};

include_once "../include/footer.php";
?>