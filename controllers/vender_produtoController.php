<?php 

$mensagens = [];

if(isset($_POST['cadastra_venda'])){
    $produto = new Produto;
        

    $total_venda = 0;
    $total_gasto = 0;
    
    //Novos - Inicio    
    $tipo_pagamento = '';
    $taxa = 0;
    $desconto = 0;
    $subtotal_venda = 0;
    //Nonos - fim

    for($j = 1; $j < 35; $j++){
        if($_POST['quantidade'.$j] == 0){
            continue;
        }
        $id_produto = $_POST['select'.$j];
        $qtd_produto = $_POST['quantidade'.$j];

        $produto_atual = $produto->find($id_produto);

        $novo_estoque = $produto_atual->qtd_estoque -  $qtd_produto;
        // atualiza o estoque do produto
        $produto->AtualizaEstoque($novo_estoque,$id_produto);

        $total_venda += $qtd_produto * $produto_atual->preco_venda;
        $total_gasto += $qtd_produto * $produto_atual->preco_compra;          
    }

    $lucro_liquido = $total_venda - $total_gasto;

    $data_venda = date('Y-m-d');
    
    
    $tipo_pagamento = filter_var($_POST['pagamento'], FILTER_SANITIZE_STRING);    
    $taxa = filter_var($_POST['taxas'], FILTER_SANITIZE_STRING);    
    $desconto = filter_var($_POST['desconto'], FILTER_SANITIZE_STRING);    

    //tenta converter em float
    floatval($taxa);
    //verificando se é do tupo número (já q vem como texto da pagina dessa controller)
    if ($_POST['taxas'] != is_numeric($taxa)) {        
        //Trocando "," por "."  
        $taxa = str_replace(",",".",$taxa); //-->Tem que ser "ponto"
    }
    if ($_POST['taxas'] == '') {        
        $taxa = 0.0;        
    }   
    
    //Converter em float
    floatval($desconto);
    //verificando se é do tupo número (já q vem como texto da pagina dessa controller)
    if ($_POST['desconto'] != is_numeric($desconto)) {        
        //Trocando "," por "."  
        $taxa = str_replace(",",".",$tdescontoxa); //-->Tem que ser "ponto"
    }
    if ($_POST['desconto'] == '') {        
        $desconto = 0.0;        
    }  

    
    $subtotal_venda += ($total_venda + (($taxa/100)*$total_venda)) - $desconto;

    $venda = new Venda;    
    $venda->CadastraVenda($data_venda, $total_venda, $lucro_liquido, 
                          '1',//-->>> ID do usuários...
                          $tipo_pagamento,
                          $taxa,
                          $desconto,
                          $subtotal_venda 
                        );

    $venda_id = $venda->PegaIdUltimaVenda();
    $venda_id = $venda_id->maxId;

    $venda_produtos = new VendaProdutos;

    for($j = 1; $j < 35; $j++){
        if($_POST['quantidade'.$j] == 0){
            continue;
        }
        $id_produto = $_POST['select'.$j];
        $qtd_produto = $_POST['quantidade'.$j];
        
        $venda_produtos->CadastraVendaProdutos($venda_id, $id_produto, $qtd_produto);
    }

    array_push($mensagens, "Venda no Total de R$ $subtotal_venda Realizada com sucesso");

}

?>