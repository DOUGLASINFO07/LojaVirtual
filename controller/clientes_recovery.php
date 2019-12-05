<?php

$smarty = new Template();

$cliente = new clientes();

if (isset($_POST['clientes_email'])) {
    $cliente->setClientes_email($_POST['clientes_email']);

    if ($cliente->GetClienteEmail($cliente->getClientes_email()) > 0) {
        $novasenha = Sistema::GerarSenha();
        $cliente->SenhaUpdate($novasenha, $cliente->getClientes_email());

        //enviar o email para o cliente
        $email = new EnviarEmail();
        $assunto = 'Nova Senha - ' . Config::SITE_NOME;
        $msg = "Olá " . $_POST['clientes_nome'] . ", uma nova senha foi solicitada por você, acesse o site: " . Config::SITE_NOME;
        $msg .= "<br> Nova Senha =  " . $novasenha;
        $destinatarios = array($cliente->getClientes_email(), Config::SITE_EMAIL_ADMIN);
        $email->Enviar($assunto, $msg, $destinatarios);

        echo'<div class="alert alert-success"> <p>Olá, foi enviada uma nova senha para acesso ao site em seu email de cadastro!!</p></div>';
        Rotas::Redirecionar(5, Rotas::pag_ClienteLogin());
    } else {
        echo'<div class="alert alert-danger"> <p>Este email não está cadastrado na loja!</p></div>';
        Rotas::Redirecionar(2, Rotas::pag_ClienteRecovery());
    }
} else {

    $smarty->display('view/clientes_recovery.tpl');
}
?>

