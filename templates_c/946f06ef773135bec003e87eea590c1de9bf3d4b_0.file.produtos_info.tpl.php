<?php
/* Smarty version 3.1.33, created on 2019-10-26 00:19:08
  from 'C:\wamp64\www\lojavirtual\view\produtos_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db390fc1704a7_21742663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '946f06ef773135bec003e87eea590c1de9bf3d4b' => 
    array (
      0 => 'C:\\wamp64\\www\\lojavirtual\\view\\produtos_info.tpl',
      1 => 1572049127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db390fc1704a7_21742663 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
?>
            <h3 class="text-center"><?php echo $_smarty_tpl->tpl_vars['P']->value['produto_nome'];?>
 - Ref: <?php echo $_smarty_tpl->tpl_vars['P']->value['produto_referencia'];?>
</h3>
            <hr>
            <div class="row">
                                <div class="col-md-6" >
                    <img class="thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['P']->value['produto_imagem_grande'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['P']->value['produto_nome'];?>
"> 
                </div>
                                <div class="col-md-6 thumbnail">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['TEMA']->value;?>
/imagens/logopagseguro.png" alt="">
                    <hr>
                    <div class="col-md-6">
                        <h3 class="text-center preco">R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['produto_valor'];?>
</h3>   
                    </div>
                    
                                        <div class="col-md-6">
                        <form name="carrinho" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_COMPRAR']->value;?>
">
                            <input type="hidden" name="produto_id" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['produto_id'];?>
">
                            <input type="hidden" name="acao" value="add">
                            <button  class="btn btn-success btn-lg">Comprar</button>
                        </form> 
                    </div>
                            
                            
                </div>
            </div>
            <!-- -->
                        <div class="row">
                <hr>
                <h4 class="text-center">Mais imagens</h4>
                <ul style="list-style: none">
                    
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['IMAGES']->value, 'I');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['I']->value) {
?>
                    
                    <li class="col-md-3 ">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['I']->value['imagem_nome'];?>
" alt="" class="thumbnail">
                    </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
                        <div class="row">
                <hr>
                <h4 class="text-center">Descrição do produto</h4>
                <?php echo $_smarty_tpl->tpl_vars['P']->value['produto_descricao'];?>
 
            </div>  
            <br>
            <br>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
