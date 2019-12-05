<?php 

$smarty = new Template();

$clientes = new clientes();
$clientes->GetClientes();

$smarty->assign('CLIENTES', $clientes->GetItens());
$smarty->assign('PAG_EDITAR', Rotas::pag_ClientesEditarADMIN());
$smarty->assign('PAG_PEDIDOS', Rotas::pag_PedidosADMIN());

$smarty->display('view/adm_clientes.tpl');

?>