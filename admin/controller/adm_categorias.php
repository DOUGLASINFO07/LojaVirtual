<?php

$smarty = new Template();

$categorias = new Categorias();

$categorias->GetCategorias();

if (isset($_POST['categorias_nova'])) {
    $categorias_nome = $_POST['categorias_nome'];
    if ($categorias->Inserir($categorias_nome)) {
        echo '<div class="alert alert-success"> Categoria Inserida com sucesso!! </div>';
        Rotas::Redirecionar(0, Rotas::pag_CategoriasADMIN());
    }
}

if (isset($_POST['categorias_editar'])) {
    $categorias_id = $_POST['categorias_id'];
    $categorias_nome = $_POST['categorias_nome'];
    if ($categorias->Editar($categorias_id, $categorias_nome)) {
        echo '<div class="alert alert-success"> Categoria Editada com sucesso!! </div>';
        Rotas::Redirecionar(0, Rotas::pag_CategoriasADMIN());
    }
}

if (isset($_POST['categorias_apagar'])) {
    $categorias_id = $_POST['categorias_id'];

    if ($categorias->Apagar($categorias_id)) {
        echo '<div class="alert alert-success"> Categoria Apagada com sucesso!! </div>';
        Rotas::Redirecionar(0, Rotas::pag_CategoriasADMIN());
    }
}

$smarty->assign('CATEGORIAS', $categorias->GetItens());

$smarty->display('view/adm_categorias.tpl');
?>