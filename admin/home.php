<?php

$smarty = new Template();

$smarty->assign('PAG_ADMIN_CLIENTE', Rotas::pag_ClientesADMIN());
$smarty->assign('PAG_ADMIN_PEDIDOS', Rotas::pag_PedidosADMIN());
$smarty->assign('PAG_CATEGORIAS', Rotas::pag_CategoriasADMIN());
$smarty->assign('PAG_ADMIN_PRODUTOS', Rotas::pag_ProdutosADMIN());
$smarty->assign('PAG_SENHA', Rotas::get_SiteADMIN() . '/adm_senha');
$smarty->assign('PAG_LOGOFF', Rotas::pag_LogoffADMIN());

$smarty->display('view/adm_home.tpl');
?>