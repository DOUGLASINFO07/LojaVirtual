<?php

$smarty = new Template();

$usuario = new Usuario();

if (isset($_POST['adm_senha_atual']) and isset($_POST['adm_senha'])) {

    $senha_atual = md5($_POST['adm_senha_atual']);
    $senha_nova = $_POST['adm_senha'];
    $email = $_SESSION['ADM']['usuario_admin_email'];

    if ($senha_atual != $_SESSION['ADM']['usuario_admin_senha']) {
        echo '<br>';
        echo'<div class="alert alert-danger"> A senha atual está incorreta</div>';
        Rotas::Redirecionar(2, Sistema::VoltarPagina());
        exit();
    }

    if ($usuario->AlterarSenha($senha_nova, $email)):
        // apos alterar envia email com a nova senha
        $enviar = new EnviarEmail();
        $assunto = 'Alteração da senha ADM no site ' . Sistema::DataAtualBR();
        $destinatarios = array($email, Config::SITE_EMAIL_ADMIN);
        $msg = '<h3> Foi feito alteração de senha ADM no site neste momento, nova senha:  ' . $senha_nova . '</h3>';
        $enviar->Enviar($assunto, $msg, $destinatarios);
        // fim do email 
        echo '<div class="alert alert-success"> Senha alterada com sucesso! Faça login com sua nova senha </div>';
        // faz redirecioamento para LOGOFF
//        Rotas::Redirecionar(2, Rotas::get_SiteADMIN());
        Rotas::Redirecionar(4, Rotas::get_SiteADMIN() . '/login.php');
    else:
        echo '<div class="alert alert-danger"> Erro ao tentar alterar a senha  </div>';
    endif;
} else {
    $smarty->display('view/adm_senha.tpl');
}
?>
