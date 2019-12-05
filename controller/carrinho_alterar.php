<?php

//Metodo para verificar se não está vindo nada do _POST
if(!isset($_POST['produto_id']) or $_POST['produto_id'] < 1){
	echo '<h4 class="alert alert-danger"> Erro na operação! </h4>';
	Rotas::Redirecionar(1, Rotas::pag_Carrinho());
	exit();
}

$id = (int) $_POST['produto_id'];

$carrinho = new Carrinho();

try {
    $carrinho->CarrinhoADD($id);
} catch (Exception $e) {
    echo '<h4 class="alert alert-danger"> Erro na operação! </h4>';
}

Rotas::Redirecionar(1, Rotas::pag_Carrinho());
?>