<?php
// SESSÃO
session_start();
if(isset($_SESSION['mensagem'])){
    ?>
    <script>
        window.onload = function (){
            M.toast({html: '<?php echo $_SESSION['mensagem'] ?>'})
        }
    </script>
    <?php
}
session_unset();
// CONEXÃO
require_once "./conexao/db_connect.php";
include_once "./include/head.php";
?>


<div class="row">
    <div class="col s12 m10 push-m1">
        <h3 class="light">HISTORICO DE VENDAS</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nome do cliente</th>
                    <th>Produto</th>
                    <th>Quantidade Comprada</th>
                    <th>Valor total</th>
                    <th>Forma de Pagamento</th>
                    <th>Data da compra</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM registro_vendas";
                    $resultado = mysqli_query($connect, $sql);
                    
                    

                    while($dados = mysqli_fetch_array($resultado)){

                        if($dados['Cliente'] != 'Sem cadastro'){
                            $id = $dados['Cliente'];
                            
                            $sql2 = " SELECT *
                                      FROM clientes
                                      WHERE ClienteID = $id
    
                            ";
    
                            $resultado2 = mysqli_query($connect, $sql2);
    
                            $dados2 = mysqli_fetch_array($resultado2);

                            $nomeCliente = $dados2['Nome'];
                        } else {
                            $nomeCliente = "Sem cadastro";
                        }
                        
                ?>
                <tr>
                    <td><?php echo $dados['RegistroID']?></td>
                    <td><?php echo $nomeCliente ?></td>
                    <td><?php echo $dados['Produto']?></td>
                    <td><?php echo $dados['Quantidade']?></td>
                    <td><?php echo $dados['TotalVenda']?></td>
                    <td><?php echo $dados['FormaPagamento']?></td>
                    <td><?php echo $dados['DataVenda']?></td>
                    <td><a class="btn-floating orange" href="./actions/editar.php?id=<?php echo $dados['RegistroID']?>"><i class="material-icons">edit</li></a></td>
                    <td><a class="btn-floating red" href="./actions/delete.php?id=<?php echo $dados['RegistroID']?>"><i class="material-icons">delete</li></a></td>
                </tr>
                <?php
                    };
                ?>
            </tbody>
        </table>
        <br>
        <a class="waves-effect waves-light btn-large green" href="adicionar_venda.php">Realizar venda</a>
        <a class="waves-effect waves-light btn-large" href="adicionar_cliente.php">Adicionar cliente</a>
        <a class="waves-effect waves-light btn-large" href="adicionar_produto.php">Adicionar produto</a>
        <!-- <a class="waves-effect waves-light btn-large" href="adicionar_forma_pagamento.php">Adicionar forma de pagamento</a> -->
    </div>
</div>
<?php
include_once "./include/footer.php";
?>