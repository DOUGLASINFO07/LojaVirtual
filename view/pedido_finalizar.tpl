{*<h3>Finalizar Compra</h3>
<hr>*}
{*<div class="col-md-4" >
<a href="{$PAG_CARRINHO}" class="btn btn-info" title="">Carrinho de compras</a>
</div>*}
<!-- botoes e op��es de cima -->
<section class="row">
    <div class="alert alert-success"> Pedido finalizado com sucesso!</div>
    {*    <div class="col-md-4">
    </div>
    <div class="col-md-4 text-right">
    </div>*}
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
            {foreach from=$PRO item=P}
                <tr>
                    <td>  {$P.produto_nome} </td>
                    <td>  {$P.produto_valor} </td>
                    <td> {$P.produto_quantidade} </td>
                    <td>  {$P.produto_subTotal} </td>
                </tr>
            {/foreach}
        </table>
    </center>
</section><!-- fim da listagem itens -->
<!-- botoes de baixo e valor total -->
<section class="row" id="total">
    {* <div class="col-md-4 text-right">
    </div>*}
    <div class="col-md-12 text-right text-danger bg-warning">
        <h4>
            Valor compra: R$ {$TOTAL} 
        </h4>
        <h4>
            Valor frete: R$ {$FRETE} 
        </h4>
        <hr>
        <h4>
            Valor Total da Compra : R$ {$TOTAL_FRETE} 
        </h4>
    </div>
    <!-- bot�o de limpar-->
    {*<div class="col-md-4 ">
    <form name="limpar" method="post" action="{$PAG_CARRINHO_ALTERAR}">
    <input type="hidden" name="acao" value="limpar">
    <input type="hidden" name="produto_id" value="1">

    <button class="btn btn-danger btn-block"> <i class="glyphicon glyphicon-trash"></i> Limpar Tudo</button>
    </form>
    </div>*}
</section>
<hr>
<!-- bot�o finalzar -->
{*<div class="row" align="Right">
<form name="confirmar" method="post" action="{$PAG_FINALIZAR}">
<button class="btn btn-success btn-block" type="submit">  <i class="glyphicon glyphicon-ok"></i> Finalizar compra </button>
</form>
</div>  *}
{*</section>*}
<section class="row">
    <input type=hidden name=encoding value=utf-8> 
    {*    <h3 class="text-center"> Formas de pagamento </h3>     *}
    <!-- botao de pagamento  -->
    <div class="col-md-4">
    </div>
    <!-- botao de pagamento  -->
    <div class="col-md-4">
        <!--FORMA DE PGTO AQUI -->
        <button class="btn btn-success btn-lg btn-block" onclick="PagSeguroLightbox({
                    code: '{$PS_COD}',
                }, {
                    success: function (transactionCode) {
                        alert('Transação efetuada - ' + transactionCode);
                {*                        window.location = '{$PAG_RETORNO}/{$REF}';*}
                        window.location = '{$PAG_RETORNO}/' + transactionCode + '/{$REF}';
                    },
                    abort: function () {
                        alert('Erro no processo de pagamento');
                        window.location = '{$PAG_ERRO}/{$REF}';
                                    }
                                });
                "> Pague com o Pagseguro 
        </button>
        {* </div>
        <div>*}
        <img src="{$TEMA}/imagens/logopagseguro.png" alt="">
        <script type="text/javascript" src="{$PS_SCRIPT}"></script>
    </div>
    {*    <input type="hidden" name="encoding" value="UTF-8">*}
    {* <div class="col-md-3" align="CENTER">
    <img src="{$TEMA}/imagens/deposito.gif" alt="">
    <script type="text/javascript" src=""></script>
    </div>*}
    <div class="col-md-4">
    </div>
</section>
<hr>
<br>