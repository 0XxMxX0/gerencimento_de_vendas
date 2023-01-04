<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";
if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);
}
$sql = "DELETE FROM produtos WHERE ProdutosID = $id;
";

if(mysqli_query($connect, $sql)){
    $_SESSION['mensagem'] = 'Produto deletada com sucesso!';
    header('Location: ../index.php');
} else {
    $_SESSION['mensagem'] = 'Erro ao deletadar';
    header('Location: ../index.php');
}