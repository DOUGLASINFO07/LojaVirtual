<?php

if (!Login::Logado()) {
    Login::AcessoNegado();
    Rotas::Redirecionar(2, Rotas::pag_ClienteLogin());
} else {

    if (isset($_SESSION['PRO'])) {

        if (!isset($_SESSION['PED']['frete']) or $_SESSION['PED']['frete'] == NULL) {
            Rotas::Redirecionar(1, Rotas::pag_Carrinho() . '#dadosfrete');
            exit('<h4 class="alert alert-danger"> Precisa selecionar o frete! </h4>');
        }

        $smarty = new Template();

        $carrinho = new Carrinho();

        $pag = new PagamentoPS();

        $ref_cod_pedido = date('ymdHms') . $_SESSION['CLI']['clientes_id'];

        if (!isset($_SESSION['PED']['pedidos'])) {
            $_SESSION['PED']['pedidos'] = $ref_cod_pedido;
        }

        if (!isset($_SESSION['PED']['ref'])) {
            $_SESSION['PED']['ref'] = $ref_cod_pedido;
        }

        $pedido = new Pedidos();
        $cliente = $_SESSION['CLI']['clientes_id'];
        $codigo = $_SESSION['PED']['pedidos'];
        $referencia = $_SESSION['PED']['ref'];
        $frete = $_SESSION['PED']['frete'];
        $tipo_frete = $_SESSION['PED']['tipo_frete'];

        $smarty->assign('PRO', $carrinho->GetCarrinho());
        $smarty->assign('TOTAL', Sistema::MoedaBR($carrinho->GetTotal()));
        $smarty->assign('TEMA', Rotas::get_SiteTEMA());
        $smarty->assign('FRETE', $_SESSION['PED']['frete']);
        $smarty->assign('TOTAL_FRETE', number_format($_SESSION['PED']['total_com_frete'], 2, ',', ''));

        $smarty->assign('NOME_CLIENTE', $_SESSION['CLI']['clientes_nome']);
        $smarty->assign('SITE_NOME', Config::SITE_NOME);
        $smarty->assign('SITE_HOME', Rotas::get_SiteHOME());
        $smarty->assign('PAG_MINHA_CONTA', Rotas::pag_ClientePedidos());

        $smarty->assign('PAG_RETORNO', Rotas::pag_PedidoRetorno());
        $smarty->assign('PAG_ERRO', Rotas::pag_PedidoRetornoERRO());
        $smarty->assign('REF', $referencia);

        $email = new EnviarEmail();

        $destinatarios = array(Config::SITE_EMAIL_ADMIN, $_SESSION['CLI']['clientes_email']);
        $assunto = 'Pedido da Loja DIMTech Loja Virtual - ' . Sistema::DataAtualBR();
        $msg = $smarty->fetch('view/email_compra.tpl');

        $email->Enviar($assunto, $msg, $destinatarios);

        if ($pedido->PedidoGravar($cliente, $codigo, $referencia, $frete, $tipo_frete)) {
            $pag->Pagamento($_SESSION['CLI'], $_SESSION['PED'], $carrinho->GetCarrinho());
            //  var_dump($pag);
            // passando para o template dados do PS
            $smarty->assign('PS_URL', $pag->psURL);
            $smarty->assign('PS_COD', $pag->psCod);
            $smarty->assign('PS_SCRIPT', $pag->psURL_Script);
            $pedido->LimparSessoes();
        }
        $smarty->display('view/pedido_finalizar.tpl');
    } else {
        echo '<h4 class="alert alert-danger"> Seu carrinho está vazio! </h4>';
        Rotas::Redirecionar(1, Rotas::pag_Produtos());
    }
}
?>