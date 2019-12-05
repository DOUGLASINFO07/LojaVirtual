<!DOCTYPE html>
<html>
    <head>
        <title>{$SITE_NOME}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="{$GET_TEMA}/tema/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{$GET_TEMA}/tema/contato/contato.css" rel="stylesheet" type="text/css"/>
        <script src="{$GET_TEMA}/tema/js/jquery-2.2.1.min.js" type="text/javascript"></script>
        <script src="{$GET_TEMA}/tema/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{$GET_TEMA}/tema/contato/contato.js" type="text/javascript"></script>
        <!-- meu aquivo pessoal de CSS-->
        <link href="{$GET_TEMA}/tema/css/tema.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js n�o funciona se voc� visualizar uma p�gina file:// -->
        <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
           <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
         <![endif]-->
    </head>
    <body>
        <!-- come�a  o container geral -->
        <div class="container-fluid">
            <!--come�a a div topo-->
            <div class="row" id="topo">
                <div class="container" >
                    <div class="col-md-6">
                        <img src="{$GET_TEMA}/imagens/logo.png" alt="" > 
                    </div>   
                    <div class="col-md-6 text-right" >
                        {if $LOGADO == TRUE}
                            Olá: {$USER} <a href="{$PAG_LOGOFF}" class="btn btn-info"><i class="glyphicon glyphicon-log-out"></i> Logout </a> 
                        {else}
                            <a href="{$PAG_LOGIN}" class="btn btn-info"><i class="glyphicon glyphicon-log-out"></i> Logar </a> 
                        {/if}
                    </div>
                </div>
            </div><!-- fim da div topo -->
            <!-- come�a a barra MENU-->
            <div class="row" id="barra-menu">
                <!--come�a navBAR-->
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
                                <li><a href="{$GET_SITE_HOME}"><i class="glyphicon glyphicon-home"></i> Home </a> </li>
                                <li><a href="{$GET_MINHACONTA}"><i class="glyphicon glyphicon-user"></i> Minha Conta </a> </li>
                                <li><a href="{$GET_CARRINHO}"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho </a> </li>
                                <li><a href="{$GET_CONTATO}" ><i class="glyphicon glyphicon-envelope"></i> Contato </a> </li>
                                <li><a href="{$GET_PRODUTOS}" ><i class="glyphicon glyphicon-lock"></i> Produtos </a> </li>
                                <li><a href="{$LOGIN_ADMIN}"><i class="glyphicon glyphicon-modal-window"></i> Administrador</a> </li>
                            </ul>
                            <form class="navbar-form navbar-right" role="search" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" name="txt_buscar" class="form-control" placeholder="Digite para buscar" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                        </div><!-- fim navbar collapse-->   
                    </div> <!--fim container navBar-->
                </nav><!-- fim da navBar-->   
            </div> <!-- fim barra menu--> 
            <!-- come�a DIV conteudo-->
            <div class="row" id="conteudo">
                <div class="container"> 
                    <!-- coluna da esquerda -->
                    <div class="col-md-2" id="lateral">
                        <div class="list-group">
                            <span class="list-group-item active">Categorias</span>
                            <a href="{$GET_PRODUTOS}" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span>Todos</a> 
                            {foreach from=$CATEGORIAS item=C}
                                <a href="{$C.categoria_link}" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span>{$C.categoria_nome}</a> 
                                {/foreach}
                        </div><!--fim da list group-->              
                    </div> <!-- finm coluna esquerda -->  
                    <!-- coluna direita CONYEUDO CENTRAL -->
                    <div class="col-md-10">
                        <!-- fim do menu breadcrumb-->    
                        {php}
                            Rotas::get_Pagina();
                            //var_dump(Rotas::$pag);
                        {/php}
                    </div>  <!--fim coluna direita-->  
                </div>   
            </div><!-- fim DIV conteudo-->
            <!-- come�a div rodape -->
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

