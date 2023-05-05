<?php
    require 'config.php';
    require 'controllers/estoqueController.php';

    require 'components/header.php';
?>

<div class="row container">
    <div class="col s12">
        <h1 class="light center">Estoque</h1>
        <hr class="hr-custom">
    </div>
</div>

<div class="row container">
    <div class="col s12">
        <p>Clique no botão para cadastrar um novo produto!</p>
        <a href="cadastra_produto.php" class="btn blue darken-2">cadastrar novo Produto</a>
    </div>
</div>
<div class="row container">
    <div class="col s12">
        <hr class="hr-custom2">
    </div>
</div>

<div class="row container">
    <form action="" method="post">
        <div class="input-field col s6">
            <input type="text" name="produto" id="produto" >
            <label for="produto">Nome do Produto</label>
        </div>
        <div class="input-field col s6">
            <button type="submit" class="btn blue darken-4 right" name="busca_produto">Buscar Produto</button>
        </div>
    </form>
</div>
<?php if(!empty($mensagens)):?>
    <div class="row container">
        <div class="col s12">
            <?php foreach($mensagens as $mensagem){
                echo $mensagem;
            }                
            ?>
        </div>
    </div>
<?php endif; ?>
<div class="row container">
    <div class="co s12">
        <h4 class="light center">Produtos</h4>
    </div>
    <div class="co s12">
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço Compra</th>
                    <th>Preço Venda</th>
                    <th>Porcentagem</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $e):?>
                    <tr>
                        <td><?php echo $e->nome;?></td>
                        <td><?php echo $e->qtd_estoque;?></td>
                        <td><?php echo FormatToMoney($e->preco_compra);?></td>
                        <td><?php echo FormatToMoney($e->preco_venda);?></td>
                        <td><?php echo FormatPorcentagem($e->porcentagem);?></td>
                        <td><a href="edita_produto.php?id=<?php echo $e->id;?>" class="btn green darken-2">Editar</a></td>
                        <td><a href="functions/excluir_produto.php?id=<?php echo $e->id;?>" class="btn red darken-2">Excluir</a></td>                        
                    </tr>
                <?php endforeach;?>    
            </tbody>
        </table>
    </div>
</div>
<!-- FOOTER -->
<?php require 'components/footer.php';?>