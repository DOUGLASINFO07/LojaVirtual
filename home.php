
<?php
$smarty = new Template();
$smarty->assign('BANNER', Rotas::ImageLink('banner.jpg', 750, 150));
$smarty->display('view/home.tpl');
include_once Rotas::get_Pasta_Controller() . '/produtos.php';




