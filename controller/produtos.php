<?php

$smarty = new Template();

$produtos = new Produtos();

$id_categoria = Rotas::$pag[1];

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
//$smarty->assign('TEMA', Rotas::get_SiteTEMA());
//$smarty->assign('BANNER', Rotas::ImageLink('banner.jpg', 750, 150));
$smarty->assign('PAGINAS', $produtos->ShowPaginacao());

$smarty->display('view/produtos.tpl');

?>

