<?php

$smarty = new Template();

Login::MenuCliente();

foreach ($_SESSION['CLI'] as $campo => $valor) {
    $smarty->assign(strtoupper($campo), $valor);
}
if (isset($_POST['clientes_nome']) and isset($_POST['clientes_email']) and isset($_POST['clientes_cpf'])) {
    //variaveis
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
    $clientes_senha = $_POST['clientes_senha'];
    $clientes_data_cad = $_SESSION['CLI']['clientes_data_cad'];
    $clientes_hora_cad = $_SESSION['CLI']['clientes_hora_cad'];

    if ($_SESSION['CLI']['clientes_pass'] != md5($clientes_senha)) {
        echo '<br>';
        echo '<div class="alert alert-danger"> <p>A senha para confirmar a alteração está incorreta</p>' . Sistema::VoltarPagina();
        echo '</div>';
        exit();
    }

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

    if (!$clientes->Editar($_SESSION['CLI']['clientes_id'])) {
        echo '<div class="alert alert-danger">Ocorreu um erro ao editar os dados</div>';
        exit();
    } else {
        echo '<script> alert("Dados alterados com sucesso! Atualizando os dados do Login..."); </script>';
        echo '<div class="alert alert-success">Dados atualizados com sucesso! Atualiando dados do login...';
        echo '</div>';
        $login = new Login();
        $login->GetLogin($clientes_email, $clientes_senha);
    }
} else {

    $smarty->display('view/clientes_dados.tpl');
}
?>
