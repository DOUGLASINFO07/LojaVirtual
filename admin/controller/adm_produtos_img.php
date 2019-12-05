<?php

$smarty = new Template();

$produto_id = (int) $_POST['produto_id'];

if (isset($_POST['produto_id']) && isset($_FILES['produto_imagem']['name'])) {
    $upload = new ImageUpload();

    if (!empty($_FILES['produto_imagem']['name'])) {

        $upload->Upload(900, 'produto_imagem');
        $produto_imagem = $upload->retorno;

        $gravar = new ProdutosImage();
        $gravar->Insert($produto_imagem, $produto_id);
    }
}

if (isset($_POST['fotos_apagar'])) {
    $apagar = new ProdutosImage();
    foreach ($_POST['fotos_apagar'] as $foto) {
        $apagar->Deletar($foto);
        $filename = Rotas::get_SiteRAIZ() . '/' . Rotas::get_ImagePasta() . $foto;
        @unlink($filename);
    }
    echo '<div class="alert alert-success">Foto(s) apagada(s) com sucesso! </div>';
}

$img = new ProdutosImage($produto_id);
$img->GetImagesPRO($_POST['produto_id']);

$smarty->assign('IMAGES', $img->GetItens());
$smarty->assign('PRO', $produto_id);


$smarty->display('view/adm_produtos_img.tpl');
?>
