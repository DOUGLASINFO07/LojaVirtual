<?php

$smarty = new Template();

Login::MenuCliente();

if (isset($_POST['clientes_senha_atual']) and isset($_POST['clientes_senha'])) {

    $senha_atual = md5($_POST['clientes_senha_atual']);
    $senha_nova = $_POST['clientes_senha'];
    $email = $_SESSION['CLI']['clientes_email'];

    if ($senha_atual != $_SESSION['CLI']['clientes_pass']) {

        echo '<br>';
        echo'<div class="alert alert-danger"> A senha atual está incorreta</div>';
        Rotas::Redirecionar(3, Rotas::pag_ClienteSenha());
        exit();
    }

    $clientes = new clientes();
    $clientes->SenhaUpdate($senha_nova, $email);

    echo'<div class="alert alert-success"> A senha foi alterada com sucesso, faça login com a nova senha!!</div>';
    $login = new Login();
    $login->GetLogin($email, $senha_nova);
    Rotas::Redirecionar(3, Rotas::pag_MinhaConta());
    
} else {

    $smarty->display('view/clientes_senha.tpl');
}
?>