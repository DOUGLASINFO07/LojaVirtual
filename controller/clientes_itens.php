<?php

$smarty = new Template();

Login::MenuCliente();

if (!isset($_POST['pedidos_cod'])) {//cod_pedido vindo do arquivo cliente_pedidos.tpl
    //<input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.pedidos_cod}">
    Rotas::Redirecionar(1, Rotas::pag_ClientePedidos());
    exit();
}

$itens = new itens();
$pedido = filter_var($_POST['pedidos_cod'], FILTER_SANITIZE_STRING); //cod_pedido vindo do arquivo cliente_pedidos.tpl
//<input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.pedidos_cod}">

$itens->GetItensPedido($pedido);
$smarty->assign('ITENS', $itens->GetItens());
$smarty->assign('TOTAL', $itens->GetTotal());

// caso o status do pagamento for NAO, mostra novamente o botão de pagar 
if ($itens->GetItens()[1]['pedidos_pag_status'] == 'PENDENTE PAGTO'):
//     $pedido = new Pedidos();
        $cliente = $_SESSION['CLI']['clientes_id'];
        $codigo = $_SESSION['PED']['pedidos'];
        $referencia = $_SESSION['PED']['ref'];
        $frete = $_SESSION['PED']['frete'];
        $tipo_frete = $_SESSION['PED']['tipo_frete'];
    // PAGAMENTO PS --------------------------
    $pag = new PagamentoPS();
    $pag->PagamentoITENS($_SESSION['CLI'], $itens->GetItens()[1], $itens->GetItens(), $frete, $tipo_frete);
    // passando para o template dados do PS
    $smarty->assign('PS_URL', $pag->psURL);
    $smarty->assign('PS_COD', $pag->psCod);
    $smarty->assign('PS_SCRIPT', $pag->psURL_Script);
    $smarty->assign('REF', $pedido);
    $smarty->assign('PAG_RETORNO', Rotas::pag_PedidoRetorno());
    $smarty->assign('PAG_ERRO', Rotas::pag_PedidoRetornoERRO());
    $smarty->assign('TEMA', Rotas::get_SiteTEMA());
/// fim do pagamento            
endif;

$smarty->display('view/cliente_itens.tpl');

