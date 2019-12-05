<h3>Meu Carrinho</h3>
<hr>
<!--Metodo para voltar página, no caso duas-->
<script>
    function goBack() {
        window.history.go(-2);
    }
</script> 
<div class="col-md-4" >
    <!--Metodo onclick chama o método goBack() para voltar duas paginas-->
    <a class="btn btn-info" title="" onclick="goBack()">Comprar Mais</a>
</div>
{*<div class="col-md-4" >
<a href="{$PAG_PRODUTOS}" class="btn btn-info" title="">Comprar Mais</a>
</div>*}
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
            {foreach from=$PRO item=P}
                <tr>
                    <td> <img src="{$P.produto_imagem}" alt="{$P.produto_nome}"> </td>
                    <td>  {$P.produto_nome} </td>
                    <td>  {$P.produto_valor} </td>
                    <td> {$P.produto_quantidade} </td>
                    <td>  {$P.produto_subTotal} </td>
                    <td> 
                        <form name="carrinho_dell" method="post" action="{$PAG_CARRINHO_ALTERAR}">
                            <input type="hidden" name="produto_id" value="{$P.produto_id}">    
                            <input type="hidden" name="acao" value="del">    
                            <button class="btn btn-danger btn-sm"> <i class="glyphicon glyphicon-minus"></i> </button>
                        </form>
                    </td>
                </tr>
            {/foreach}
        </table>
    </center>
</section><!-- fim da listagem itens -->
<!--  bloco frete -->
<section class="row" id="dadosfrete">
    {*    <div class="row">*}
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form  method="post"> 
            <div class="form-group">
                <select required class="form-control" name="servico">
                    <option value="">Selecione o tipo de envio</option>
                    <option value="SEDEX">SEDEX</option>
                    <option value="PAC">PAC</option>
                </select>
            </div>
            <!-- Input peso -->
            <input type="hidden" name="peso_frete" id="peso_frete" value="{$PESO}" class="form-control " readonly>
            <!-- Input onde é digitado o CEP -->
            <div class="form-group">
                <input type="text" class="form-control" name="destino" id="cep_frete"  placeholder="digite seu cep" required>
            </div>
            <div class="text-center" style="margin-bottom: 15px;">
                <!-- Botão que envia as informações -->
                <button class="btn btn-warning btn-block" id="buscar_frete"> <i class="glyphicon glyphicon-send"></i> Calcular Frete </button>  
            </div>
            <div class="text-center" style="margin-bottom: 15px;" align="center">
                <!-- Valor e prazo do frete -->
                {if $VALOR_FRETE > 0}
                    <p class="text-right text-danger">{$SERVICO}: <span class="text-left text-danger">{$REAL}{$VALOR_FRETE} - {$PRAZO}</p>
                {/if}
            </div>
        </form>
    </div>
    {*    </div>*}
</section>

<hr>

<!-- botoes de baixo e valor total -->
<section class="row" id="total">
    <div class="col-md-4 text-center text-danger bg-warning">
        <h4>
            Total : R$ {$TOTAL} 
        </h4>
    </div>
    <div class="col-md-4 text-center text-danger bg-warning">
        <h4>
            Total com Frete: R$ {$TOTAL_COM_FRETE} 
        </h4>
    </div>
    <!-- bot�o de limpar-->
    <div class="col-md-4 ">
        <form name="limpar" method="post" action="{$PAG_CARRINHO_ALTERAR}">
            <input type="hidden" name="acao" value="limpar">
            <input type="hidden" name="produto_id" value="1">

            <button class="btn btn-danger btn-block"> <i class="glyphicon glyphicon-trash"></i> Limpar Tudo</button>
        </form>
    </div>
</section>

<hr>
<!-- bot�o finalzar -->
<div class="row" align="Right">
    <form name="confirmar" method="post" action="{$PAG_CONFIRMAR}">

        <input type="hidden" name="frete_radio" id="frete_radio" value="{$VALOR_USA}">
        <input type="hidden" name="tipo_frete" id="tipo_frete" value="{$SERVICO}">

        <button class="btn btn-success btn-block" type="submit">  <i class="glyphicon glyphicon-ok"></i> Confirmar Pedido </button>
    </form>
</div>  
<br>
</section>



