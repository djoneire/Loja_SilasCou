<?php
    require 'config.php';
    require 'controllers/cadastra_produtoController.php';

    require 'components/header.php';
?>

<div class="row container">
    <div class="col s12">
        <h1 class="light center">Cadastrar Produto</h1>
        <hr class="hr-custom">
    </div>
</div>

<div class="contorno container">
    <div class="row">
        <div class="col s12">
            <h5 class="center">Preencha os Campos</h5>
        </div>
        <div class="col s12">
            <h2 class="center"><span class="material-icons center" style="font-size:65px;">create</span></h2>
        </div>
        <form action="" method="post">
            <div class="input-field col s12 m6">            
                <input id="nome" type="text" name="nome">
                <label for="nome">Produto</label>                
            </div>
            <div class="input-field col s12 m6">
                <input id="qtd_estoque" type="text" name="qtd_estoque">
                <label for="qtd_estoque">Quantidade no Estoque</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="preco_compra" type="text" name="preco_compra">
                <label for="preco_compra">Preço de Compra</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="preco_venda" type="text" name="preco_venda">
                <label for="preco_venda">Preço de venda</label>
            </div>
            <div class="input-field col s12">
                <p>Clique no botão para cadastrar o produto no estoque!</p>
                <button type="submit" name="cadastrar_produto" class="btn blue darken-4">Cadastrar Produto</button>
                
            </div>

            <!-- Aqui chama a Controller/cadastra_produtoController.php -->
            <?php if(!empty($mensagens)): ?>            
            <div class="col s12">
                <?php 
                    foreach ($mensagens as $mensagem){
                        echo $mensagem;
                    }                        
                ?>
            </div>                
        <?php
             endif;?>  
 
        </form>
 
    </div>
</div>
<!-- FOOTER -->
<?php require 'components/footer.php';?>