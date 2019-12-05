<?php
/* Smarty version 3.1.33, created on 2019-10-26 03:26:25
  from 'C:\wamp64\www\lojavirtual\view\pedido_confirmar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db3bce14268d4_47093864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b30be6f7131b46456e13e58081a87c8405c04bb' => 
    array (
      0 => 'C:\\wamp64\\www\\lojavirtual\\view\\pedido_confirmar.tpl',
      1 => 1572060379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db3bce14268d4_47093864 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>Finalizar Pedido</h3>
<hr>
<div class="col-md-4" >
    <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO']->value;?>
" class="btn btn-info" title="">Carrinho de compras</a>
</div>
<!-- botoes e op��es de cima -->
<section class="row">

    <div class="col-md-4">
    </div>
    <div class="col-md-4 text-right">
    </div>
</section>
<br>
<!--  table listagem de itens -->
<section class="row ">
    <center>
        <table class="table table-bordered" style="width: 95%">

            <tr class="text-danger bg-danger">
                <td></td> 
                <td>Produto</td> 
                <td>Valor R$</td> 
                <td>Quantidade</td> 
                <td>Sub Total R$</td> 
            </tr>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
?>

                <tr>
                    <td> <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['produto_imagem'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['P']->value['produto_nome'];?>
"> </td>
                    <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['produto_nome'];?>
 </td>
                    <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['produto_valor'];?>
 </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['P']->value['produto_quantidade'];?>
 </td>
                    <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['produto_subTotal'];?>
 </td>
                </tr>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </table>
    </center>
</section><!-- fim da listagem itens -->
<!-- botoes de baixo e valor total -->
<section class="row" id="total">
    <div class="col-md-4 text-right">
    </div>
    <div class="col-md-4 text-right text-danger bg-warning">
        <h4>
            Total : R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
 
        </h4>
    </div>
    <!-- bot�o de limpar-->
    <div class="col-md-4 ">
        <form name="limpar" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_FINALIZAR']->value;?>
">
            
            <button class="btn btn-success btn-block"> <i class="glyphicon glyphicon-ok"></i> Finalizar compra</button>
        </form>
    </div>
</section>
<hr>
<!-- bot�o finalzar -->
<br>
</section>

</h1>
<?php }
}
