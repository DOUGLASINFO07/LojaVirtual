<?php 

$smarty = new Template();

$produtos = new Produtos();

//if(isset(Rotas::$pag[1])){
//	$produtos->GetProdutosCategoriaID(Rotas::$pag[1]);
//}else{
//	$produtos->GetProdutos();
//}

if (isset(Rotas::$pag[1]) && !isset($_POST['txt_buscar'])) {
    $produtos->GetProdutosCategoriaID(Rotas::$pag[1]);
} elseif (isset($_POST['txt_buscar']) && !isset(Rotas::$pag[1])) {
    $nome = filter_var($_POST['txt_buscar'], FILTER_SANITIZE_STRING);
    $produtos->GetProdutosNome($nome);
} elseif (isset($_POST['txt_buscar']) && isset(Rotas::$pag[1])) {
    $nome = filter_var($_POST['txt_buscar'], FILTER_SANITIZE_STRING);
    $produtos->GetProdutosNomeCategoria($nome, Rotas::$pag[1]);
} else {
    $produtos->GetProdutos();
}

//Se não encontrar nenhum produto, volta a pagina em que estava no momento da pesquisa.
if($produtos->TotalDados() < 1){
    echo '<H4 class="alert alert-danger"> Nenhum produto encontrado!!</h4>';
    Rotas::Redirecionar(2, Sistema::VoltarPaginaSemBotao());
}

$smarty->assign('PRO', $produtos->GetItens());
$smarty->assign('PRO_INFO', Rotas::pag_ProdutosInfo());
$smarty->assign('PRO_TOTAL', $produtos->TotalDados());
$smarty->assign('PAGINAS', $produtos->ShowPaginacao());
$smarty->assign('PAG_PRODUTO_NOVO', Rotas::pag_ProdutosNovoADMIN());
$smarty->assign('PAG_PRODUTO_EDITAR', Rotas::pag_ProdutosEditarADMIN());
$smarty->assign('PAG_PRODUTO_IMG', Rotas::pag_ProdutosImgADMIN());

$smarty->display('view/adm_produtos.tpl');

?>