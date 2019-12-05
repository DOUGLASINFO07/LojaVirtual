<?php

$smarty = new Template();

if (isset($_POST['produto_nome']) && isset($_POST['produto_valor'])) {
    $produto_nome = $_POST['produto_nome'];
    $produto_categoria = $_POST['produto_categoria'];
    $produto_ativo = $_POST['produto_ativo'];
    $produto_modelo = $_POST['produto_modelo'];
    $produto_referencia = $_POST['produto_referencia'];
    $produto_valor = $_POST['produto_valor'];
    $produto_estoque = $_POST['produto_estoque'];
    $produto_peso = $_POST['produto_peso'];
    $produto_altura = $_POST['produto_altura'];
    $produto_largura = $_POST['produto_largura'];
    $produto_comprimento = $_POST['produto_comprimento'];
    $produto_imagem = $_FILES['produto_imagem']['name'];
    $produto_descricao = $_POST['produto_descricao'];
    $produto_slug = $_POST['produto_slug'];

    if (!empty($_FILES)) {
        $upload = new ImageUpload();
        if ($upload->Upload(900, 'produto_imagem')) {
            $produto_imagem = $upload->retorno;
        } else {
            exit('Erro ao enviar a imagem');
        }
    }

    $gravar = new Produtos();

    $gravar->Preparar(
            $produto_nome,
            $produto_categoria,
            $produto_ativo,
            $produto_modelo,
            $produto_referencia,
            $produto_valor,
            $produto_estoque,
            $produto_peso,
            $produto_altura,
            $produto_largura,
            $produto_comprimento,
            $produto_imagem,
            $produto_descricao,
            $produto_slug
    );


    if ($gravar->Inserir()) {
        echo '<div class="alert alert-success">Produto Cadastrado com Sucesso!!</div>';
        Rotas::Redirecionar(2, Rotas::pag_ProdutosADMIN());
    } else {
        echo '<div class="alert alert-danger">Produto não cadastrado!!';
        Sistema::VoltarPagina();
        echo '</div>';
        exit();
    }
}

$categorias = new Categorias();
$categorias->GetCategorias();

$smarty->assign('CATEGORIAS', $categorias->GetItens());
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());

$smarty->display('view/adm_produtos_novo.tpl');
?>