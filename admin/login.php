<?php

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION)) {
    session_start();
}

require '../lib/autoload.php';

$smarty = new Template();

$usuario = new Usuario();

if (isset($_POST['recovery'])):
    // obejto USER
    
    // passo alguns valores
    $email = $_POST['txt_email'];
    $senha = Sistema::GerarSenha();
    // verifico se tem este email na tabela 
    if ($usuario->GetUsuario_admin_email($email) > 0):
        // faz alteração 
        $usuario->AlterarSenha($senha, $email);
        // apos alterar envia email com a nova senha
        $enviar = new EnviarEmail();
        $assunto = 'Nova senha ADM do site ' . Sistema::DataAtualBR();
        $destinatarios = array($email, Config::SITE_EMAIL_ADMIN);
        $msg = ' Nova senha no ADM do site, nova senha:  ' . $senha;
        $enviar->Enviar($assunto, $msg, $destinatarios);
        echo '<div class="alert alert-success"> Foi enviado um email com a nova senha!    Confira seu e-mail!</div>';
        Rotas::Redirecionar(5, Rotas::get_SiteADMIN() . "/login.php");
    else:
        echo '<div class="alert alert-danger"> Email não encontrado </div>';
    endif;
endif;

if (isset($_POST['txt_logar']) && isset($_POST['txt_email'])) {
    $user = $_POST['txt_email'];
    $senha = $_POST['txt_senha'];
    $login = new Login();
    if ($login->GetLoginADMIN($user, $senha)) {
        Rotas::Redirecionar(0, 'index.php');
        exit();
    }
}

$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('HOME', Rotas::get_SiteHOME());

$smarty->display('view/adm_login.tpl');

?>

