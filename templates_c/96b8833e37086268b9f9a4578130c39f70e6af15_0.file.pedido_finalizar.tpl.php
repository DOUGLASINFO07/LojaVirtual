<?php
/* Smarty version 3.1.33, created on 2019-10-28 20:10:19
  from 'C:\wamp64\www\lojavirtual\view\pedido_finalizar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db74b2ba0b2c4_28272432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96b8833e37086268b9f9a4578130c39f70e6af15' => 
    array (
      0 => 'C:\\wamp64\\www\\lojavirtual\\view\\pedido_finalizar.tpl',
      1 => 1572288460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db74b2ba0b2c4_28272432 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>Finalizar Compra</h3>
<hr>
<!-- botoes e op��es de cima -->
<section class="row">
    
    <div class="alert alert-success"> Pedido finalizado com sucesso!</div>

</section>
<!--  table listagem de itens -->
<section class="row ">
    <center>
        <table class="table table-bordered" style="width: 95%">

            <tr class="text-danger bg-danger">
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
        <div class="col-md-12 text-right text-danger bg-warning">
        <h4>
            Total : R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
 
        </h4>
    </div>
    <!-- bot�o de limpar-->
    </section>
<hr>
<!-- bot�o finalzar -->


<section class="row">
    <h3 class="text-center"> Formas de pagamento </h3>     
    <!-- botao de pagamento  -->
  <div class="col-md-4">
    </div>
    <div class="col-md-4" align="CENTER">
        <img src="<?php echo $_smarty_tpl->tpl_vars['TEMA']->value;?>
/imagens/logopagseguro.png" alt="">
        <?php echo '<script'; ?>
 type="text/javascript" src=""><?php echo '</script'; ?>
>
    </div>
       <div class="col-md-4">
    </div>
</section>
        <hr>
        <br><?php }
}
