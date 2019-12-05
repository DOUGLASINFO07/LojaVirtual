<?php

$smarty = new Template();

if (isset($_POST['clientes_email']) && isset($_POST['clientes_nome']) && isset($_POST['clientes_cpf'])) {
    $clientes_nome = $_POST['clientes_nome'];
    $clientes_sobrenome = $_POST['clientes_sobrenome'];
    $clientes_data_nasc = $_POST['clientes_data_nasc'];
    $clientes_rg = $_POST['clientes_rg'];
    $clientes_cpf = $_POST['clientes_cpf'];
    $clientes_ddd = $_POST['clientes_ddd'];
    $clientes_fone = $_POST['clientes_fone'];
    $clientes_celular = $_POST['clientes_celular'];
    $clientes_endereco = $_POST['clientes_endereco'];
    $clientes_numero = $_POST['clientes_numero'];
    $clientes_bairro = $_POST['clientes_bairro'];
    $clientes_cidade = $_POST['clientes_cidade'];
    $clientes_uf = $_POST['clientes_uf'];
    $clientes_cep = $_POST['clientes_cep'];
    $clientes_email = $_POST['clientes_email'];
    $clientes_senha = Sistema::GerarSenha();
    $clientes_data_cad = Sistema::DataAtualUS();
    $clientes_hora_cad = Sistema::HoraAtual();

    $clientes = new clientes();

    $clientes->Preparar(
            $clientes_nome,
            $clientes_sobrenome,
            $clientes_data_nasc,
            $clientes_rg,
            $clientes_cpf,
            $clientes_ddd,
            $clientes_fone,
            $clientes_celular,
            $clientes_endereco,
            $clientes_numero,
            $clientes_bairro,
            $clientes_cidade,
            $clientes_uf,
            $clientes_cep,
            $clientes_email,
            $clientes_data_cad,
            $clientes_hora_cad,
            $clientes_senha
    );

    $clientes->Inserir();
    
     $smarty->assign('NOME', $clientes_nome);
     $smarty->assign('SITE', Config::SITE_NOME);
     $smarty->assign('EMAIL', $clientes_email);
     $smarty->assign('SENHA', $clientes_senha);
     $smarty->assign('PAG_MINHA_CONTA', Rotas::pag_ClienteConta());
     $smarty->assign('SITE_HOME', Rotas::get_SiteHOME());

    $email = new EnviarEmail();
    $assunto = 'Cadastro Efetuado - ' . Config::SITE_NOME;
    $msg = $smarty->fetch('view/email_cliente_cadastro.tpl');
    $destinatarios = array($clientes_email, Config::SITE_EMAIL_ADMIN);
    $email->Enviar($assunto, $msg, $destinatarios);

    echo'<div class="alert alert-success"> Cadastro Efetuado!! A senha para fazer login foi enviada para seu email cadastrado. <br>' . 'Acesse seu email e confira!</div>';
    Rotas::Redirecionar(5, Rotas::pag_ClienteLogin());
    
} else {

    $smarty->display('view/cadastro.tpl');
}
?>

