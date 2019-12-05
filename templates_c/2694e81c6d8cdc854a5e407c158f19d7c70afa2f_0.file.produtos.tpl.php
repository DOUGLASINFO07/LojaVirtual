<?php
/* Smarty version 3.1.33, created on 2019-10-24 23:14:33
  from 'C:\wamp64\www\lojavirtual\view\produtos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db23059680489_26192957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2694e81c6d8cdc854a5e407c158f19d7c70afa2f' => 
    array (
      0 => 'C:\\wamp64\\www\\lojavirtual\\view\\produtos.tpl',
      1 => 1571958866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db23059680489_26192957 (Smarty_Internal_Template $_smarty_tpl) {
?>





<?php if ($_smarty_tpl->tpl_vars['PRO_TOTAL']->value < 1) {?>
    <H4 class="alert alert-danger"> Nenhum produto encontrado!!</h4>
    <?php }?>


<!--  começa lista de produtos  ---->   
<section id="produtos" class="row">  

   
    <ul style="list-style: none" >

        <div class="row" id="pularliha" >

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
?>

                <li class="col-md-4">

                    <div class="thumbnail" id="thumbnail" >

                        <a href="<?php echo $_smarty_tpl->tpl_vars['PRO_INFO']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['produto_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['produto_slug'];?>
">

                            <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['produto_imagem'];?>
" alt="" class="img img-responsive img-rounded" > 

                            <div class="caption">

                                <h4 class="text-center"><?php echo $_smarty_tpl->tpl_vars['P']->value['produto_nome'];?>
</h4> 

                                <h3 class="text-center text-danger">R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['produto_valor'];?>
</h3>

                            </div>

                        </a>

                    </div>

                </li>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </div>

    </ul>

</section>

<!--  paginação inferior   -->  
<section id="pagincao" class="row">
    <center>
        <?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>

    </center>
</section><?php }
}
