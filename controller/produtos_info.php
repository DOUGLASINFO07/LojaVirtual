<?php

$smarty = new Template();

$produtos = new Produtos();
$produtos->GetProdutosID(Rotas::$pag[1]);

$images = new ProdutosImage();
$images->GetImagesPRO(Rotas::$pag[1]);
//var_dump($produtos->GetItens());

$smarty->assign('PRO', $produtos->GetItens());
$smarty->assign('TEMA', Rotas::get_SiteTEMA());
$smarty->assign('IMAGES', $images->GetItens());
$smarty->assign('PAG_COMPRAR', Rotas::pag_CarrinhoAlterar());

//$ID = Rotas::$pag[1];
//foreach ($produtos->GetItens() as $pro) {
//    $_SESSION['PRO'][$ID]['ID'] = $pro['produto_id'];
//    $_SESSION['PRO'][$ID]['NOME'] = $pro['produto_nome'];
//    $_SESSION['PRO'][$ID]['VALOR'] = $pro['produto_valor'];
//    $_SESSION['PRO'][$ID]['VALOR_US'] = $pro['produto_valor_us'];
//    $_SESSION['PRO'][$ID]['PESO'] = $pro['produto_peso'];
//    $_SESSION['PRO'][$ID]['QTD'] = 1;
//    $_SESSION['PRO'][$ID]['IMG'] = $pro['produto_imagem'];
//    $_SESSION['PRO'][$ID]['LINK'] = 'sssslink';
//    $ID++;
//}

//var_dump($produtos->GetItens());
//var_dump($produtos);

$smarty->display('view/produtos_info.tpl');
