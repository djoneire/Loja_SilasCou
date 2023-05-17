<?php
    require 'config.php';
    require 'controllers/vender_produtoController.php';

    require 'components/header.php';
?>


    <div class="row container">
        <div class="col s12">
            <!-- <h1 class="light center">Vendas - Saídas</h1> -->
            
        </div>
    </div>
    <div class="contorno container">
        <div class="row">
            <div class="col s12" style="margin-bottom: 20px;">
             <h4 class="center"> <strong> Nova Venda </strong> </h4 class="center">
                <p class="center text-fluid">Preencha os campos para realizar uma nova venda</p>
                <hr class="hr-custom">
            </div>
            <form action="" method="post" class="venda-form">
                <!-- PHP dos Selects -->
                <?php require 'functions/venderSelect.php'?>
                <div class="col s12">
                    <a href="" class="btn-center">Adicionar Produto</a>                    
                </div>
                <div class="col s12">
                </br>
                </br>
                </br>
                    <p class="text-fluid right">Para completar a transação, clique no botão!</p>
                </div>
                <div class="col s10 campo-valor-total" style="margin-left: 20px; ">                    
                    <div class="input-field col s5">
                        <strong> 
                            <select id="1" name="pagamento">                                 
                                <option value="Dinheiro" selected>DINHEIRO</option>                
                                <option value="Cartão" selected>CARTÃO</option>                
                                <option value="Não Definido" selected>ESCOLHA O PAGAMENTO</option>   
                                <!-- <option value="Não Definido" disabled selected>ESCOLHA O PAGAMENTO</option>   -->
                            </select>
                        </strong>                         
                    </div>
<!--
                    <div class="input-field col s5">
                        <input id="pagamento" type="text" name="pagamento">
                        <label for="pagamento">Taxas</label>
                    </div>-->
                    <div class="input-field col s5">
                        <input id="taxas" type="text" name="taxas">
                        <label for="taxas">Taxas</label>
                    </div>
                    <div class="input-field col s5">
                        <input id="desconto" type="text" name="desconto">
                        <label for="desconto">Desconto</label>
                    </div> <!--
                    <div class="col s2">                                           
                        <h5><strong> SubTotal: </strong> <span class="valor-total"> R$0,00</span> </h5>                    
                    </div>-->
                    <div class="col s2">                                           
                        <h5><strong> Total: </strong> <span class="valor-total"> R$0,00</span> </h5>                    
                    </div>

                </div>
                    <div class="col s6">
                        <button type="submit" class="btn green darken-8 right" name="cadastra_venda">Fechar Venda</button>
                    </div>                          
                </div>  
            </div>
            </form>
        </div>
        <?php
            if(!empty($mensagens)):
        ?>
            <div class="row">
                <?php foreach($mensagens as $mensagem):?>
                    <div class="col s12">
                        <h6 class="green-text text-darken-3"><?php echo $mensagem?></h6>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
            endif;
        ?>
    </div>

    <!-- FOOTER -->
    <?php require 'components/footer.php';?>
