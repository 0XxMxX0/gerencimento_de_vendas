<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";

if(isset($_POST['btn-editar'])){
    $cliente = mysqli_escape_string($connect, $_POST['name']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $id = mysqli_escape_string($connect, $_POST['id']);
    
    $sql = "UPDATE Clientes SET Nome = '$cliente', Email = '$email'
            WHERE ClienteID = $id; 
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