<?php
/* Smarty version 3.1.33, created on 2019-10-21 09:05:41
  from 'C:\wamp64\www\lojavirtual\view\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dad74e5a04928_10806296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4da16f91b58795a071766d6529f7c7b21bffe570' => 
    array (
      0 => 'C:\\wamp64\\www\\lojavirtual\\view\\index.tpl',
      1 => 1571431610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dad74e5a04928_10806296 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['SITE_NOME']->value;?>
</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/contato/contato.css" rel="stylesheet" type="text/css"/>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/js/jquery-2.2.1.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/contato/contato.js" type="text/javascript"><?php echo '</script'; ?>
>
        <!-- meu aquivo pessoal de CSS-->
        <link href="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/css/tema.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
          <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
        <![endif]-->

    </head>
    <body>

        <!-- começa  o container geral -->
        <div class="container-fluid">

            <!-- começa a div topo -->
            <div class="row" id="topo">

                <div class="container">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/imagens/logo.png" alt=""> 

                </div>    

            </div><!-- fim da div topo -->

            <!-- começa a barra MENU-->
            <div class="row" id="barra-menu">

                <!--começa navBAR-->
                <nav class="navbar navbar-inverse">

                    <!-- container navBAr-->
                    <div class="container">
                        <!-- header da navbar-->
                        <div class="navbar-header">
                            <!-- botao que mostra e esconde a navbar--> 
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div><!--fim header navbar-->  

                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['GET_HOME']->value;?>
"><i class="glyphicon glyphicon-home"></i> Home </a> </li>

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['GET_MINHACONTA']->value;?>
"><i class="glyphicon glyphicon-user"></i> Minha Conta </a> </li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['GET_CARRINHO']->value;?>
"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho </a> </li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['GET_CONTATO']->value;?>
" ><i class="glyphicon glyphicon-envelope"></i> Contato </a> </li>

                                
                            </ul>

                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Digite para buscar" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>

                        </div><!-- fim navbar collapse-->   


                    </div> <!--fim container navBar-->

                </nav><!-- fim da navBar-->   
            </div> <!-- fim barra menu--> 

            <!-- começa DIV conteudo-->
            <div class="row" id="conteudo">

                <div class="container"> 

                    <!-- coluna da esquerda -->
                    <div class="col-md-2" id="lateral">

                        <div class="list-group">
                            <span class="list-group-item active">Categorias</span>

                            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> Presentes</a> 
                            <a href="#" class="list-group-item"><i class="glyphicon glyphicon-menu-right"></i> Brinquedos</a> 

                            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> Presentes</a> 
                            <a href="#" class="list-group-item"><i class="glyphicon glyphicon-menu-right"></i> Brinquedos</a> 

                            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> Presentes</a> 
                            <a href="#" class="list-group-item"><i class="glyphicon glyphicon-menu-right"></i> Brinquedos</a> 


                        </div><!--fim da list group-->              

                    </div> <!-- finm coluna esquerda -->  

                    <!-- coluna direita CONYEUDO CENTRAL -->
                    <div class="col-md-10">

                                                <!-- fim do menu breadcrumb-->    

                        <?php 
                            Rotas::get_Pagina();
                            //var_dump(Rotas::$pag);
                        ?>

                    </div>  <!--fim coluna direita-->  

                </div>   
            </div><!-- fim DIV conteudo-->




            <!-- começa div rodape -->
            <div class="row" id="rodape">
                
                <CEnter>
                    <h4>DIMTech - DouglasInfo07 - LOJA DIMTECH</h4>
                </CEnter>

                <!--footer starts from here-->
                <footer class="footer">
                    <div class="container bottom_border">
                        <div class="row">
                            <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                                <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
                                <!--headin5_amrc-->
                                <p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
                                <p><i class="fa fa-phone"></i>  +91-9999878398  </p>
                                <p><i class="fa fa fa-envelope"></i> info@example.com  </p>

                            </div>

                            <div class=" col-sm-4 col-md  col-6 col">
                                <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
                                <!--headin5_amrc-->
                                <ul class="footer_ul_amrc">
                                    <li><a href="http://webenlance.com">Image Rectoucing</a></li>
                                    <li><a href="http://webenlance.com">Clipping Path</a></li>
                                    <li><a href="http://webenlance.com">Hollow Man Montage</a></li>
                                    <li><a href="http://webenlance.com">Ebay & Amazon</a></li>
                                    <li><a href="http://webenlance.com">Hair Masking/Clipping</a></li>
                                    <li><a href="http://webenlance.com">Image Cropping</a></li>
                                </ul>
                                <!--footer_ul_amrc ends here-->
                            </div>

                            <div class=" col-sm-4 col-md  col-6 col">
                                <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
                                <!--headin5_amrc-->
                                <ul class="footer_ul_amrc">
                                    <li><a href="http://webenlance.com">Remove Background</a></li>
                                    <li><a href="http://webenlance.com">Shadows & Mirror Reflection</a></li>
                                    <li><a href="http://webenlance.com">Logo Design</a></li>
                                    <li><a href="http://webenlance.com">Vectorization</a></li>
                                    <li><a href="http://webenlance.com">Hair Masking/Clipping</a></li>
                                    <li><a href="http://webenlance.com">Image Cropping</a></li>
                                </ul>
                                <!--footer_ul_amrc ends here-->
                            </div>

                        </div>
                    </div>

                    <div class="container">
                        <!--foote_bottom_ul_amrc ends here-->
                        <p class="text-center">Copyright @2017 | Designed With by <a href="#">Loja DIMTech - DouglasInfo07</a></p>
                    </div>

            </div><!-- fim div rodape-->




        </div> <!-- fim do container geral -->

    </body>
</html>

<?php }
}
