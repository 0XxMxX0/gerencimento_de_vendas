<?php
// CONEXÃO
require_once "./conexao/db_connect.php";
include_once "./include/head.php";
?>
<div class="row">
    <div class="col s12 m10 push-m1">
        <h3>Nova venda</h3>
        <form action="./actions/create.php" method="POST">
            <div class="input-field col s12">
                <select name="name" id="name">
                <option value="0" selected>Nome do Cliente</option>
                <?php
                
                $sql_produtos = "SELECT * FROM Clientes";

                $resultado = mysqli_query($connect, $sql_produtos);

                while($campo = mysqli_fetch_array($resultado)){

                ?>
                    <option value="<?php echo $campo['Nome']?>"><?php echo $campo['Nome']?></option>
                <?php
                }   
                ?>
                </select>
            </div>
            
            <div class="input-field col s12"> 
                <select name="produto" id="produto">
                <option value="" disabled selected>Nome do produto</option>
                <?php
                
                $sql_produtos = "SELECT * FROM produtos";

                $resultado = mysqli_query($connect, $sql_produtos);

                while($campo = mysqli_fetch_array($resultado)){

                ?>
                    <option value="<?php echo $campo['Nome']?>"><?php echo $campo['Nome']?></option>
                <?php
                }   
                ?>
                </select>
            </div>

            <div class="input-field col s12">
                <label for="quantidade-produto">Quantidades</label>
                <input type="number" required name="quantidade-produto" id="quantidade-produto"/>
            </div>

            <div class="input-field col s12">
                <label for="total-venda">Total da venda</label>
                <input type="number" required name="total-venda" id="total-venda"/>
            </div>

            <div class="input-field col s12">
                <select name="forma-pagamento" id="forma-pagamento">
                    <option value="" disabled selected>Forma de pagamento</option>
                    <option value="Credito">Credito</option>
                    <option value="debito">Debito</option>
                </select>
            </div>
            
            <div class="input-field col s12">
                <label for="data-venda">Data da venda</label>
                <input type="date" name="data-venda"  required id="data-venda"/>
            </div>

            <button type="submit" class="waves-effect waves-light btn-large green" name="btn-cadastrar">Finalizar venda</button>
            <a class="btn-large" href="index.php" type="submit">Historico de vendas</a>
        </form>
    </div>
</div>
<?php
include_once "./include/footer.php";
?>
