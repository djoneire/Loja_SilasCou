<?php
 
//Verificar campos vazios a parti do botão 'cadastrar_produto" da cadastra_produto.php
if(isset($_POST["cadastrar_produto"])){ 
    if(strlen($_POST['nome']) == 0 || strlen($_POST['qtd_estoque']) == 0 || strlen($_POST['preco_compra']) == 0 || strlen($_POST['preco_venda']) == 0)
    {
        echo "<script type= 'text/javascript'>alert('Favor preencher todos os campos!');</script>";
        return;
    }
}

$mensagens = [];
if(isset($_POST['cadastrar_produto'])){
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $qtd_estoque = filter_var($_POST['qtd_estoque'], FILTER_SANITIZE_STRING);
    $preco_compra = filter_var($_POST['preco_compra'], FILTER_SANITIZE_STRING);
    $preco_venda = filter_var($_POST['preco_venda'], FILTER_SANITIZE_STRING);

    $produto = new Produto;
    

    if($produto->CadastraProduto($nome, $preco_compra, $preco_venda, $qtd_estoque)){
        array_push($mensagens, "<h6 class=\"green-text text-darken-3\">Produto Cadastrado com Sucesso</h6>");
    }else{
        array_push($mensagens, "<h6 class=\"red-text text-darken-3\">Erro ao Cadastrar Produto</h6>");
    }
}

?>