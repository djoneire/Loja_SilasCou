<?php
    require 'config.php';
    require 'controllers/detalhes_vendaController.php';

    require 'components/header.php';
?>


<div class="row container">
    <div class="col s12">
        <h3 class="light center">Venda</h3>
        <hr class="hr-custom">
    </div>
</div>

<div class="row container">
    <div class="col s12 m8">
        <table class="striped">
            <thead>
                <tr>
                    <th style="text-align:center;">Estatisticas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Data</th>
                    <td><?php echo FormataData($vendaAtual->data_venda);?></td>
                </tr>
                <tr>
                    <th>Pagamento</th>
                    <td><?php echo ($vendaAtual->tipo_pagamento);?></td>
                </tr>
                <tr>
                    <th>Taxa</th>
                    <td><?php echo number_format($vendaAtual->taxa, 2);?>%</td>
                </tr>
                <tr>
                    <th>Desconto</th>
                    <td>R$<?php echo number_format($vendaAtual->desconto_venda, 2);?></td>
                </tr>
                <tr>
                    <th>SubTotal</th>
                    <td>R$<?php echo number_format($vendaAtual->subtotal_venda, 2);?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>R$<?php echo number_format($vendaAtual->total_venda, 2);?></td>
                </tr>
                <tr>
                    <th>Lucro Líquido</th>
                    <td>R$<?php echo number_format($vendaAtual->lucro_liquido, 2);?></td>
                </tr>
                <tr>
                    <th>Porcentagem</th>
                    <td><?php echo CalculaPorcentagemVenda($vendaAtual);?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col s12 m4">
    <table class="striped">
            <thead>
                <tr>
                    <th>Produtos</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($id_produtos as $e):?>
                    <tr>
                        <th><?php echo PegaNomeProduto($e->produto_id);?></th>
                        <td style="text-align:center;"><?php echo $e->qtd_produto;?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<!-- FOOTER -->
<?php require 'components/footer.php';?>
