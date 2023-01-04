<?php
// CONEXÃO
require_once "../conexao/db_connect.php";
include_once "../include/head.php";
if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT *
            FROM Clientes
            WHERE ClienteID = '$id';
    ";
    $resultado = mysqli_query($connect, $sql);

    $dados = mysqli_fetch_array($resultado);
}
?>
<div class="row">
    <div class="col s12 m10 push-m1">
        <h3>Editar Cliente</h3>
        <form action="../actions/update_cliente.php" method="POST">
            <input type="hidden" name='id' id='id' value="<?php echo $dados['ClienteID']; ?>"/>
            <div class="input-field col s12">
                    <label for="name">Nome do cliente</label>
                    <input type="text" name="name" id="name" value="<?php echo $dados['Nome'] ?>"/>
                </div>
                
                <div class="input-field col s12"> 
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $dados['Email'] ?>"/>
                </div>
            
            <button type="submit" class="waves-effect waves-light btn-large green" name="btn-editar">Atualizar cliente</button>
            <a href="../historico_clientes.php" class="btn-large" >Historico de clientes</a>
        </form>
    </div>
</div>
<?php
include_once "../include/footer.php";
?>