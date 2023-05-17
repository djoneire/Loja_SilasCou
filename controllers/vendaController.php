<?php 

$venda = new Venda;

$vendas = $venda->PegaVendasDecrescente();

$mensagens = [];

if(isset($_POST['buscar_vendas'])){
    $data_inicial = $_POST['data_inicial'];
    $data_final = $_POST['data_final'];
    $vendas = $venda->PegarVendasPorPeriodo($data_inicial, $data_final);
}


if(isset($_GET['sucesso'])){
    $_GET['sucesso'] == 1 ? array_push($mensagens, "<h6 class=\"green-text text-darken-3\">Cancelado com Sucesso!!</h6>") : array_push($mensagens, "<h6 class=\"red-text text-darken-3\">Erro ao Cancelar!!</h6>");
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
        //$porcentagem = ($e->lucro_liquido / (CalculaSubTotal($e) - $e->lucro_liquido)) * 100;
        $porcentagem = number_format($porcentagem, 2);       
        return $porcentagem."%";
    }   
}

function FormataTaxaPorcentagem($e){
    $e = number_format($e, 2);
    return $e."%";
}

function FormatToMoney($e){
    $e = number_format($e, 2);
    return "R$ ".$e;
}

function FormataData($data){
    $data = new DateTime($data);
    return $data->format('d/m/Y');
}

function BuscaNome($id){
    $usuario = new Usuario;
    $usuarios = $usuario->find($id);
    return $usuarios->nome;
}

function CalculaTotal($e){         
    $calcula = 0;
    $subtotal = 0;
    
    $calcula = $e->total_venda +(($e->taxa/100)*$e->total_venda);
    
    $subtotal = $calcula - ($e->desconto_venda);
    
    $subtotal = number_format($subtotal, 2);    
    
    return $subtotal;
} 

?>