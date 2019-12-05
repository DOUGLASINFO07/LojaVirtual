<?php

if (isset($_SESSION['PRO'])) {

    if (!isset($_POST['frete_radio']) or $_POST['frete_radio'] == NULL) {
        Rotas::Redirecionar(1, Rotas::pag_Carrinho() . '#dadosfrete');//será redirecionado para a section com id='dadosfrete'
        exit('<h4 class="alert alert-danger"> Precisa selecionar o frete! </h4>');
    }


    $smarty = new Template();

    $carrinho = new Carrinho();

    $smarty->assign('PRO', $carrinho->GetCarrinho());

    $_SESSION['PED']['frete'] = $_POST['frete_radio'];
    $_SESSION['PED']['total_com_frete'] = ($_POST['frete_radio'] + $carrinho->GetTotal());
    $_SESSION['PED']['tipo_frete'] = $_POST['tipo_frete'];
    
    $smarty->assign('TOTAL', Sistema::MoedaBR($carrinho->GetTotal()));
    $smarty->assign('PAG_CARRINHO_ALTERAR', Rotas::pag_CarrinhoAlterar());
    $smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
    $smarty->assign('PAG_FINALIZAR', Rotas::pag_PedidoFinalizar());

    $smarty->assign('FRETE', Sistema::MoedaBR($_SESSION['PED']['frete']));
    $smarty->assign('TOTAL_FRETE', Sistema::MoedaBR($_SESSION['PED']['total_com_frete']));
    $smarty->assign('TIPO_FRETE', $_SESSION['PED']['tipo_frete']);

    $smarty->display('view/pedido_confirmar.tpl');
} else {
    echo '<h4 class="alert alert-danger"> Seu carrinho está vazio! </h4>';
    Rotas::Redirecionar(1, Rotas::pag_Produtos());
}

//var_dump($carrinho->GetCarrinho());
?>