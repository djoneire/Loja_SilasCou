<?php
    require 'config.php';
    require 'controllers/vendaController.php';

    require 'components/header.php';
?>

<div class="row container">
    <div class="col s12">
        <h1 class="light center">Controle de Vendas</h1>
        <hr class="hr-custom">
    </div>
</div>

<div class="row container">
    <div class="col s12">
        <p class="fluid-text">Preencha o periodo de tempo que deseja buscar as vendas!</p>
    </div>
    <form action="" method="post">
        <div class="col s4">
            <input type="date" name="data_inicial" id="data_inicial">
        </div>
        <div class="col s4">
            <input type="date" name="data_final" id="data_final">
        </div>
        <div class="col s4">
            <button type="submit" class="btn blue darken-3 right" name="buscar_vendas">Buscar Vendas</button>
        </div>
    </form>
</div>
<div class="row container">
    <div class="col s12">
        <hr class="hr-custom2">
    </div>
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
    <div class="col s12">
    <table class="striped centered">
        <thead>
            <tr>
                <th>Data </th>
                <th>Pagamento</th>
                <th>Taxas</th>
                <th>Desconto</th>
                <th>SubTotal</th>
                <th>Total</th>                                
                <th>Lucro</th>
                <th>Porcentagem</th>

                <th>Detalhes Venda</th>
                <th>Cancelar Venda</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vendas as $e):?>
                <tr>
                    <td><?php echo FormataData($e->data_venda);?></td>
                    <td><?php echo ($e->tipo_pagamento);?></td>
                    <td><?php echo FormataTaxaPorcentagem($e->taxa);?></td>
                    <td><?php echo FormatToMoney($e->desconto_venda);?></td>
                    <td><?php echo FormatToMoney($e->total_venda);?></td>
                    <td><?php echo FormatToMoney(CalculaTotal($e));?></td>                    
                    <td><?php echo FormatToMoney($e->lucro_liquido);?></td>
                    <td><?php echo CalculaPorcentagemVenda($e)?></td>
                    

                    <td><a href="detalhes_venda.php?id=<?php echo $e->id;?>" class="btn green darken-2">Detalhes</a></td>
                    <td><a href="functions/cancelar_venda.php?id=<?php echo $e->id;?>" class="btn red darken-2">Cancelar</a></td>
                <tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>

<!-- FOOTER -->
<?php require 'components/footer.php';?>
