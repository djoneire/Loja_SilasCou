<?php
    require 'config.php';
    require 'controllers/estatisticasController.php';

    require 'components/header.php';
?>

<div class="row container">
    <div class="col s12">
        <h1 class="light center">Controle de Caixa</h1>
        <!-- <hr class="hr-custom"> -->
    </div>
</div>
<div class="row container">
    <div class="col s12">
        <p class="fluid-text">Preencha o periodo de tempo que deseja buscar os dados!</p>
</br>
    </div>
    <form action="" method="post">
        <div class="col s6">
        <i>Data Inicial</i>
            <input type="date" name="data_inicial" id="data_inicial">
        </div>

        <div class="col s6">
            <i>Data Final</i>
            <input type="date" name="data_final" id="data_final">
        </div>  
        
        <div class="col s12">
            <button type="submit" class="btn blue darken-3 right" name="buscar_estatisticas">Buscar Estatisticas</button>
        </div>
    </form>
</div>
<div class="row container">    
    <div class="col s12">        
</br>
</br>
        <h5 class="center">Totalizadores do Período</h5>
        <hr class="hr-custom">
    </div>
</div>
<div class="row container">    
    <div class="col s6">
        <div class="caixaTotalVendas">            
            <h6 class="center orange-text text-darken-3"><strong>Total Vendas</strong></h6>     
            <h5 class="center orange-text text-darken-3"><strong>R$ <?php echo number_format($valores_totais->total_venda,2); ?></strong></h5>
        </div>        
    </div>

    <div class="col s6">
        <div class="caixaTotalLiquido">   
            <h6 class="center green-text text-darken-3"><strong>Total Líquido</strong></h6>            
            <h5 class="center green-text text-darken-3"><strong>R$ <?php echo number_format($valores_totais->lucro_liquido,2); ?> </strong></h5>
        </div>        
    </div>
        
    <div class="col s12">
        <div class="caixaPorcentagem">   
        <h6 class="center blue-text text-darken-3"><strong>Porcentagem de lucros no período</strong></h6>            
        <h5 class="center blue-text text-darken-3"><?php echo $porcentagem?>%</h5>
        </div>
        </div>
    </div>
    
</div>
<!-- FOOTER -->
<?php require 'components/footer.php';?>
