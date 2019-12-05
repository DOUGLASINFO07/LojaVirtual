<?php

$smarty = new Template();

$gravar = new Produtos();

if(isset($_POST['produto_apagar']) && isset($_POST['produto_id_apagar']) && $_POST['produto_apagar'] == 'SIM'){
	if($gravar->Apagar($_POST['produto_id_apagar'])){
		echo '<div class="alert alert-success">Produto Excluido com Sucesso!!</div>';
		@unlink($_POST['produto_imagem_arquivo']);
		Rotas::Redirecionar(2, Rotas::pag_ProdutosADMIN());
		exit();
	}else{
		echo '<div class="alert alert-danger">O produto não pode ser excluido!!</div>';
	}
}


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
    $produto_id = $_POST['produto_id'];
    $produto_imagem_arquivo = $_POST['produto_imagem_arquivo'];
    

    if (!empty($_FILES['produto_imagem']['name'])) {
        $upload = new ImageUpload();
        if ($upload->Upload(900, 'produto_imagem')) {
            $produto_imagem = $upload->retorno;
            @unlink($produto_imagem_arquivo);
        } else {
            exit('Erro ao enviar a imagem');
        }
    } else {
        $produto_imagem = $_POST['produto_imagem_atual'];
    }

    

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


    if ($gravar->Alterar($produto_id)) {
        echo '<div class="alert alert-success">Produto Atualizado com Sucesso!!</div>';
//        Rotas::Redirecionar(2, Rotas::pag_ProdutosADMIN());
    } else {
        echo '<div class="alert alert-danger">Produto não foi editado!!';
        Sistema::VoltarPagina();
        echo '</div>';
        exit();
    }
}

$categorias = new Categorias();
$categorias->GetCategorias();

//Pegar o id dos produtos
$produtos = new Produtos();
$id = $_POST['produto_id'];
$produtos->GetProdutosID($id);

$smarty->assign('CATEGORIAS', $categorias->GetItens());
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('PRO', $produtos->GetItens());

$smarty->display('view/adm_produtos_editar.tpl');
?>