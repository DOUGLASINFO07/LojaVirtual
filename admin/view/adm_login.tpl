<!DOCTYPE html>
<html>
    <head>
        <title>Area restrita </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{$GET_TEMA}/tema/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="{$GET_TEMA}/tema/js/jquery-2.2.1.min.js" type="text/javascript"></script>
        <script src="{$GET_TEMA}/tema/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- meu aquivo pessoal de CSS-->
        <link href="{$GET_TEMA}/tema/css/tema.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background-color: #245269">
        <br>
        <br>
        <section class="container" >
            <section class="row">
                <div class="col-md-4"></div>    
                <div class="col-md-4 thumbnail" id="bloco_login_adm">
                    <h4 class="text-center"> Área restrita </h4>
                    <form name="login" method="post" action="">
                        <label>Email:</label>
                        <input type="email" name="txt_email" class="form-control" required autocomplete="off">
                        <label>Senha:</label>
                        <input type="password" name="txt_senha" class="form-control" required>
                        <br>
                        <button class="btn btn-success btn-block btn-lg" name="txt_logar" value="txt_logar"> Entrar </button>
                    </form>
                    <!-- botão senha recovery --->
                    <br>
                    <center><button class="btn btn-warning btn-block " data-toggle="collapse" data-target="#recovery"> Esqueci a senha </button></center>
                    <div class="alert alert-danger collapse" id="recovery">
                        <form name="recovery" method="post" action="">
                            <label>Digite o email do administrador </label>
                            <input type="email" name="txt_email" class="form-control" required>
                            <button class="btn btn-success" name="recovery" value="recovery">Solicitar senha</button>
                        </form> 
                    </div>
                </div>    
                <div class="col-md-4"></div>    
            </section>
        </section>
    </body>
</html>
