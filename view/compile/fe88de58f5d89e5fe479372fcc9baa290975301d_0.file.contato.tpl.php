<?php
/* Smarty version 3.1.33, created on 2019-10-21 09:33:33
  from 'C:\wamp64\www\lojavirtual\view\contato.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dad7b6db45200_48967757',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe88de58f5d89e5fe479372fcc9baa290975301d' => 
    array (
      0 => 'C:\\wamp64\\www\\lojavirtual\\view\\contato.tpl',
      1 => 1571650408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dad7b6db45200_48967757 (Smarty_Internal_Template $_smarty_tpl) {
?><link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<?php echo '<script'; ?>
 src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>

<div class="container">
    <div class="col-md-5">
        <div class="form-area" id="formulario" >  
            <form action="envioemail" role="form" >
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Formulário de Contato</h3>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Assunto" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Mensagem" maxlength="140" rows="7"></textarea>
                    <span class="help-block"><p id="characterLeft" class="help-block ">Você atingiu o limite de 140 caracteres!</p></span>                    
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right" >Enviar Formulário</button>
            </form>
        </div>
    </div>
</div><?php }
}
