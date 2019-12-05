<?php
/* Smarty version 3.1.33, created on 2019-10-31 12:06:11
  from 'C:\wamp64\www\lojavirtual\view\menu_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbace33f2f546_26584693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a8a45891c0dc873ba8ab518188e3f939590052d' => 
    array (
      0 => 'C:\\wamp64\\www\\lojavirtual\\view\\menu_cliente.tpl',
      1 => 1572522237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dbace33f2f546_26584693 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4 class="text-center text-danger"> Olá <b><?php echo $_smarty_tpl->tpl_vars['USER']->value;?>
</b>, seja bem vindo! O que deseja fazer agora?</h4> 
<section class="row">
    
    <div class="text-center">
        
        <a href="" class="btn btn-success"><i class="glyphicon glyphicon-home"></i> Minha Conta</a>
        
        <a href="" class="btn btn-success"><i class="glyphicon glyphicon-barcode"></i> Pedidos</a>
        
        <a href="" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Meus Dados </a>
        <a href="" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho </a>
        <a href="" class="btn btn-warning"> Alterar Senha </a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOGOFF']->value;?>
" class="btn btn-danger"><i class="glyphicon glyphicon-log-out"></i> Sair </a>
      
    </div>

</section>
<?php }
}
