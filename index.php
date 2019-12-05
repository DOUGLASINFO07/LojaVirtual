<?php

date_default_timezone_set ('America / Sao_Paulo');

if(!isset($_SESSION)){
    session_start();
}

//if(!isset($_SESSION['PED']['pedidos'])){
//    $_SESSION['pedidos'] = md5(uniqid(date('YmdHms')));//md5 codifica a identificação da SESSION
//}
//
//if(!isset($_SESSION['PED']['ref'])){
//    $_SESSION['ref'] = md5(uniqid(date('ymdHms')));//md5 codifica a identificação da SESSION
//}
        require './lib/autoload.php';
        
        $smarty = new Template();
        $categorias = new Categorias();
        $categorias->GetCategorias();
        
        $smarty->assign('NOME', 'Douglas Borges Egidio - DouglasInfo07');
        $smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
        $smarty->assign('GET_NOME', Config::SITE_NOME);
        $smarty->assign('GET_SITE_HOME', Rotas::get_SiteHOME());
        $smarty->assign('GET_CARRINHO', Rotas::pag_Carrinho());
        $smarty->assign('GET_MINHACONTA', Rotas::pag_MinhaConta());
        $smarty->assign('GET_CONTATO', Rotas::pag_Contato());
        $smarty->assign('GET_PRODUTOS', Rotas::pag_Produtos());
        $smarty->assign('SITE_NOME', Config::SITE_NOME);
        $smarty->assign('CATEGORIAS', $categorias->GetItens());
        $smarty->assign('DATA', Sistema::DataAtualBR());
        $smarty->assign('HORA', Sistema::HoraAtual());
        $smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
        $smarty->assign('PAG_LOGIN', Rotas::pag_Login());
        $smarty->assign('LOGADO', Login::Logado());
        $smarty->assign('LOGIN_ADMIN', Rotas::get_SiteADMIN());
        
        
        if(Login::Logado()){
	$smarty->assign('USER', $_SESSION['CLI']['clientes_nome']);
	$smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
//	Login::MenuCliente();
}
        
//        $dados = new conexao();
        
//        $sql = "SELECT* FROM categorias";
//        
//        $dados->ExecuteSQL($sql);
//        
//        $listar = $dados->ListarDados($sql);
//        
//        var_dump($listar);
//        
//        var_dump($dados->TotalDados());
//        $template = 'view/index.tpl';

        $smarty->display('view/index.tpl');
        
        

