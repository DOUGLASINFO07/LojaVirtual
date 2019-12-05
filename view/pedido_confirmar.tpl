{*<h3>Finalizar Pedido</h3>
<hr>*}
<div class="col-md-4" >
    <a href="{$PAG_CARRINHO}" class="btn btn-info" title="">Carrinho de compras</a>
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

            {foreach from=$PRO item=P}

                <tr>
                    <td> <img src="{$P.produto_imagem}" alt="{$P.produto_nome}"> </td>
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
    <div class="col-md-4 text-right">
    </div>
    <div class="col-md-4 text-right text-danger bg-warning">
        <h4>
            Valor da compra: R$ {$TOTAL} 
        </h4>
        <h4>
            Valor do Frete : R$ {$FRETE} VIA - {$TIPO_FRETE}.
        </h4>
        <hr>
        <h4>
            Valor à pagar: R$ {$TOTAL_FRETE} 
        </h4>
    </div>
    <!-- bot�o de limpar-->
    <div class="col-md-4 ">
        <form name="limpar" method="post" action="{$PAG_FINALIZAR}">
            {*<input type="hidden" name="acao" value="limpar">
            <input type="hidden" name="produto_id" value="1">*}

            <button class="btn btn-success btn-block"> <i class="glyphicon glyphicon-ok"></i> Finalizar compra</button>
        </form>
    </div>
</section>
<hr>
<!-- bot�o finalzar -->
{*<div class="row" align="Right">
    <form name="confirmar" method="post" action="{$PAG_CONFIRMAR}">
    <button class="btn btn-success btn-block" type="submit">  <i class="glyphicon glyphicon-ok"></i> Confirmar Pedido </button>
    </form>
</div>  *}
<br>
</section>

</h1>
