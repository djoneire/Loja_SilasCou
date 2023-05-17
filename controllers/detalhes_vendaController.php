<?php

$venda_produtos = new vendaProdutos;
$venda = new Venda;


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $vendaAtual = $venda->find($id);
    $id_produtos = $venda_produtos->BuscaTudoAtravesVenda($id);
}else{
    header('Location: vendas.php');
}

function PegaNomeProduto($id){
    $produto = new Produto;
    $produtoAtual = $produto->find($id);
    return $produtoAtual->nome;
}

function CalculaPorcentagemVenda($e){    
    if(($e->lucro_liquido <= 0) || ($e->total_venda <=0))
    {
        $porcentagem = 0;
        $porcentagem = number_format($porcentagem, 2);
        return $porcentagem."%"; 
    }
    else
    {    
        $porcentagem = ($e->lucro_liquido / ($e->total_venda - $e->lucro_liquido)) * 100;
        $porcentagem = number_format($porcentagem, 2);
        return $porcentagem."%";
    }       
}

function FormataData($data_venda){
    $data_venda = new DateTime($data_venda);
    return $data_venda->format('d/m/Y');
}
?>