<?php

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION)) {
    session_start();
}

require '../lib/autoload.php';

if(!Login::LogadoADMIN()){
    Rotas::Redirecionar(0, 'login.php');
//    exit('<h2>Erro! Acesso negado!</2>');
}else{

$smarty = new Template();
$categorias = new Categorias();
$categorias->GetCategorias();

//valores para o template
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('TITULO_SITE', Config::SITE_NOME);
$smarty->assign('SITE_NOME', Config::SITE_NOME);
$smarty->assign('GET_SITE_HOME', Rotas::get_SiteHOME());
$smarty->assign('GET_SITE_ADMIN', Rotas::get_SiteADMIN());
$smarty->assign('PAG_ADMIN_CLIENTE', Rotas::pag_ClientesADMIN());
$smarty->assign('PAG_ADMIN_PEDIDOS', Rotas::pag_PedidosADMIN());
$smarty->assign('PAG_CONTATO', Rotas::pag_Contato());
$smarty->assign('PAG_CATEGORIAS', Rotas::pag_CategoriasADMIN());
$smarty->assign('PAG_ADMIN_PRODUTOS', Rotas::pag_ProdutosADMIN());
$smarty->assign('PAG_SENHA', Rotas::get_SiteADMIN() .'/adm_senha');
$smarty->assign('PAG_LOGOFF', Rotas::pag_LogoffADMIN());
$smarty->assign('CATEGORIAS', $categorias->GetItens());
$smarty->assign('DATA', Sistema::DataAtualBR());
$smarty->assign('LOGADO', Login::LogadoADMIN());
$smarty->assign('HOME', Rotas::pag_homeADMIN());
$smarty->assign('LOGIN_LOJA', Rotas::pag_Login());

if (Login::LogadoADMIN()) {
    $smarty->assign('USER', $_SESSION['ADM']['usuario_admin_nome']);
    $smarty->assign('DATA', $_SESSION['ADM']['usuario_admin_data']);
    $smarty->assign('HORA', $_SESSION['ADM']['usuario_admin_hora']);
}

$smarty->display('view/adm_index.tpl');
}
?>