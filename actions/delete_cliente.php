<?php
// SESSÃO
session_start();

// CONEXÃO
require_once "../conexao/db_connect.php";
if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);
}
$sql = "DELETE FROM registro_vendas WHERE RegistroID = $id;
";

if(mysqli_query($connect, $sql)){
    $_SESSION['mensagem'] = 'Venda deletada com sucesso!';
    header('Location: ../index.php');
    echo "$id";
} else {
    $_SESSION['mensagem'] = 'Erro ao deletadar';
    header('Location: ../index.php');
}