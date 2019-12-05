<?php
/* Smarty version 3.1.33, created on 2019-10-26 03:08:55
  from 'C:\wamp64\www\lojavirtual\view\carrinho.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db3b8c754e230_29047624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3637e6571e1584387cee4cc2c52116aa1451a5b5' => 
    array (
      0 => 'C:\\wamp64\\www\\lojavirtual\\view\\carrinho.tpl',
      1 => 1572059331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db3b8c754e230_29047624 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>Meu Carrinho</h3>
<hr>
<div class="col-md-4" >
    <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_PRODUTOS']->value;?>
" class="btn btn-info" title="">Comprar Mais</a>
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
                <td></td> 
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
                    <td> 
                        <form name="carrinho_dell" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO_ALTERAR']->value;?>
">
                            <input type="hidden" name="produto_id" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['produto_id'];?>
">    
                            <input type="hidden" name="acao" value="del">    
                            <button class="btn btn-danger btn-sm"> <i class="glyphicon glyphicon-minus"></i> </button>
                        </form>
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
        <form name="limpar" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO_ALTERAR']->value;?>
">
            <input type="hidden" name="acao" value="limpar">
            <input type="hidden" name="produto_id" value="1">

            <button class="btn btn-danger btn-block"> <i class="glyphicon glyphicon-trash"></i> Limpar Tudo</button>
        </form>
    </div>
</section>
<hr>
<!-- bot�o finalzar -->
<div class="row" align="Right">
    <form name="confirmar" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CONFIRMAR']->value;?>
">
    <button class="btn btn-success btn-block" type="submit">  <i class="glyphicon glyphicon-ok"></i> Confirmar Pedido </button>
    </form>
</div>  
<br>
</section>

<?php }
}
