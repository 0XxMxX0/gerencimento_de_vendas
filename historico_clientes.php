<?php
// SESSÃO
session_start();
if(isset($_SESSION['mensagem'])){
    echo $_SESSION['mensagem'];
}
session_unset();
// CONEXÃO
require_once "./conexao/db_connect.php";

include_once "./include/head.php";
?>
<div class="row">
    <div class="col s12 m10 push-m1">
        <h3 class="light">Historico de clientes</h3>
        <table class="striped">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome do cliente</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM clientes";
                $resultado = mysqli_query($connect, $sql);

                while($dados = mysqli_fetch_array($resultado)){
            ?>
            <tr>
                <td><?php echo $dados['ClienteID']?></td>
                <td><?php echo $dados['Nome']?></td>
                <td><?php echo $dados['Email']?></td>
                <td><a class="btn-floating orange" href="./actions/editar_cliente.php?id=<?php echo $dados['ClienteID']?>"><i class="material-icons">edit</li></a></td>
                <td><a class="btn-floating red" href="./actions/delete.php?id=<?php echo $dados['ClienteID']?>"><i class="material-icons">delete</li></a></td>
            </tr>
            <?php
                };
            ?>
        </tbody>
        </table>
        <br>
        <a class="waves-effect waves-light btn-large green" href="adicionar_cliente.php">Adicionar cliente</a>
        <a class="btn-large" href="adicionar_venda.php">Adicionar venda</a>
    </div>
</div>
<?php
include_once "./include/footer.php";
?>