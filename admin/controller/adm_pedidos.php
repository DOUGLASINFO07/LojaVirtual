<?php

$smarty = new Template();

$pedidos = new Pedidos();

if (isset($_POST['pedidos_apagar'])) {
    $ped_cod = $_POST['cod_pedido'];
    if ($pedidos->Apagar($ped_cod)) {
        echo '<div class="alert alert-success"> Pedido Excluido!!</div>';
//        Rotas::Redirecionar(2, Rotas::pag_ClientesADMIN());
    }
}

//$pag[1] verifica o que está sendo passado no id da posicao 1 da url, depois do nome do controller.
if (isset(Rotas::$pag[1])) {
    $id = (int) Rotas::$pag[1];
    $pedidos->GetPedidosCliente($id);
} elseif (isset($_POST['data_ini']) and isset($_POST['data_fim'])) {
    $pedidos->GetPedidosData($_POST['data_ini'], $_POST['data_fim']);
} elseif (isset($_POST['txt_ref'])) {
    $ref = filter_var($_POST['txt_ref'], FILTER_SANITIZE_STRING);
    $pedidos->GetPedidosREF($ref);
} else {
    $pedidos->GetPedidosCliente();
}

$smarty->assign('PEDIDOS', $pedidos->GetItens());
$smarty->assign('PAG_ITENS', Rotas::pag_ItensADMIN());
$smarty->assign('PAGINACAO', $pedidos->ShowPaginacao());
$smarty->assign('TESTE', $id);

if ($pedidos->TotalDados() > 0) {
    $smarty->display('view/adm_pedidos.tpl');
} else {
    echo '<div class="alert alert-danger"> Nenhum pedido para este cliente</div>';
}
?>