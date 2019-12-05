<?php

Class Rotas {

    public static $pag;
    private static $pasta_controller = 'controller';
    private static $pasta_view = 'view';
    private static $pasta_ADMIN = 'admin';

    static function get_SiteHOME() {
        return Config::SITE_URL . '/' . Config::SITE_PASTA;
    }

    static function get_SiteRAIZ() {
        return $_SERVER['DOCUMENT_ROOT'] . '/' . Config::SITE_PASTA;
//        return filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING) . '/' . Config::SITE_PASTA;
    }

    static function get_SiteTEMA() {
        return self::get_SiteHOME() . '/' . self::$pasta_view;
    }

    static function pag_Carrinho() {
        return self::get_SiteHOME() . '/carrinho';
    }

    static function pag_Produtos() {
        return self::get_SiteHOME() . '/produtos';
    }

    static function pag_ProdutosInfo() {
        return self::get_SiteHOME() . '/produtos_info';
    }

    static function pag_Contato() {
        return self::get_SiteHOME() . '/contato';
    }

    static function pag_MinhaConta() {
        return self::get_SiteHOME() . '/minhaconta';
    }

    static function pag_PedidoConfirmar() {
        return self::get_SiteHOME() . '/pedido_confirmar';
    }

    static function get_ImagePasta() {
        return '/media/images/';
    }

    static function get_ImageURL() {
        return self::get_SiteHOME() . '/' . self::get_ImagePasta();
    }

    static function pag_Logoff() {
        return self::get_SiteHOME() . '/logoff';
    }

    static function pag_Login() {
        return self::get_SiteHOME() . '/login';
    }

    static function pag_ClienteConta() {
        return self::get_SiteHOME() . '/minhaconta';
    }

    static function pag_ClientePedidos() {
        return self::get_SiteHOME() . '/clientes_pedidos';
    }

    static function pag_ClienteLogin() {
        return self::get_SiteHOME() . '/login';
    }

    static function pag_ClienteItens() {
        return self::get_SiteHOME() . '/clientes_itens';
    }

    static function ImageLink($imagem, $largura, $altura) {
        $img = self::get_ImageURL() . "thumb.php?src={$imagem}&w={$largura}&h={$altura}&zc=1";
        return $img;
    }

    static function pag_CarrinhoAlterar() {
        return self::get_SiteHOME() . '/carrinho_alterar';
    }

    static function get_Pasta_Controller() {
        return self::$pasta_controller;
    }

    static function pag_PedidoFinalizar() {
        return self::get_SiteHOME() . '/pedido_finalizar';
    }

    static function pag_ClienteCadastro() {
        return self::get_SiteHOME() . '/cadastro';
    }

    static function pag_ClienteRecovery() {
        return self::get_SiteHOME() . '/clientes_recovery';
    }

    static function pag_ClienteDados() {
        return self::get_SiteHOME() . '/clientes_dados';
    }

    static function pag_ClienteSenha() {
        return self::get_SiteHOME() . '/clientes_senha';
    }

    //MÉTODO PARA REDIRECIONAR
    static function Redirecionar($tempo, $pagina) {
        $url = '<meta http-equiv="refresh" content="' . $tempo . '; url=' . $pagina . '">';
        echo $url;
    }

    //Me´todo para area administrativa
    static function get_SiteADMIN() {
        return self::get_SiteHOME() . '/' . self::$pasta_ADMIN;
    }

    static function pag_ProdutosADMIN() {
        return self::get_SiteADMIN() . '/adm_produtos';
    }

    static function pag_ProdutosNovoADMIN() {
        return self::get_SiteADMIN() . '/adm_produtos_novo';
    }

    static function pag_ProdutosEditarADMIN() {
        return self::get_SiteADMIN() . '/adm_produtos_editar';
    }

    static function pag_ProdutosDeletarADMIN() {
        return self::get_SiteADMIN() . '/adm_produtos_deletar';
    }

    static function pag_ProdutosImgADMIN() {
        return self::get_SiteADMIN() . '/adm_produtos_img';
    }

    static function pag_ClientesADMIN() {
        return self::get_SiteADMIN() . '/adm_clientes';
    }

    static function pag_ClientesEditarADMIN() {
        return self::get_SiteADMIN() . '/adm_clientes_editar';
    }

    static function pag_PedidosADMIN() {
        return self::get_SiteADMIN() . '/adm_pedidos';
    }

    static function pag_ItensADMIN() {
        return self::get_SiteADMIN() . '/adm_itens';
    }

    static function pag_CategoriasADMIN() {
        return self::get_SiteADMIN() . '/adm_categorias';
    }
    
    static function pag_homeADMIN() {
        return self::get_SiteADMIN() . '/adm_home';
    }
    
    static function pag_LogoffADMIN() {
        return self::get_SiteADMIN() . '/adm_logoff';
    }
    
    static function pag_PedidoRetorno() {
        return self::get_SiteHOME() . '/pedido_retorno';
    }
    
    static function pag_PedidoRetornoERRO() {
        return self::get_SiteHOME() . '/pedido_retorno_erro';
    }

    static function get_pagina() {
//        filter_input(INPUT_GET, 'pag')
//        if (isset($_GET['pag'])) {
        if (filter_input(INPUT_GET, 'pag', FILTER_SANITIZE_STRING)) {

//            $pagina = $_GET['pag'];
            $pagina = filter_input(INPUT_GET, 'pag', FILTER_SANITIZE_STRING);

            self::$pag = explode('/', $pagina);

            $pagina = 'controller/' . self::$pag[0] . '.php';
            
            if (file_exists($pagina)) {
                include $pagina;
            } else {
                include 'erro.php';
            }
        } else {
            include 'home.php';
        }
    }

}
