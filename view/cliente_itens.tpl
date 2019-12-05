<h4 class="text-center">Dados do pedido</h4>
<!-- informações sobre o pedido -->
<section class="row">
    <center>
        <table class="table table-bordered" style="width: 80%">
            <tr class="bg-success">
                <td><b>Data:</b> {$ITENS.1.pedidos_data}</td>
                <td><b>Hora:</b> {$ITENS.1.pedidos_hora}</td>
                <td><b>Ref:</b> {$ITENS.1.pedidos_ref}</td>
                <td><b>Status:</b> {$ITENS.1.pedidos_pag_status}</td>
            </tr>  
        </table>
    </center>
</section>
<!-- listagem dos itens -->
<section class="row" id="listaitens">
    <center>
        <table class="table table-bordered" style="width: 80%">
            <tr class="text-success bg-success">
                <td></td>
                <td>Item</td>
                <td>Valor Uni</td>
                <td>Quantidade</td>
                <td>Sub</td>
            </tr>
            {foreach from=$ITENS item=P}
                <tr>
                    <td><img src="{$P.item_img}" alt=""> </td>
                    <td> {$P.item_nome}</td>
                    <td class="text-right"> {$P.item_valor}</td>
                    <td class="text-center"> {$P.item_qtd}</td>
                    <td class="text-right"> {$P.item_sub}</td>
                </tr>
            {/foreach}
        </table>
    </center>
</section>
<section class="row" id="resumo">
    <center>
        <table class="table table-bordered" style="width: 80%">
            <tr>
                <td class="text-danger"> <b>Frete: R$ </b> {$ITENS.1.pedidos_frete_valor}</td>
                <td class="text-danger"> <b>Total: R$ </b> {$TOTAL}</td>
                <td class="text-danger"> <b>Final: R$ </b> {$ITENS.1.pedidos_frete_valor+$TOTAL}</td>
            </tr>  
        </table>
</section>  

{if $ITENS.1.pedidos_pag_status =='PENDENTE PAGTO'}          
    <!--  modos de pagamento e outras informações --> 
    <section class="row">
        <h3 class="text-center"></h3>     
        <div class="col-md-4">
        </div>
        <!-- botao de pagamento  -->
        <div class="col-md-4">
           <button class="btn btn-success btn-lg btn-block" onclick="PagSeguroLightbox({
                        code: '{$PS_COD}',
                    }, {
                        success: function (transactionCode) {
                            alert('Transação efetuada - ' + transactionCode);
                            window.location = '{$PAG_RETORNO}/' + transactionCode + '/{$REF}';
                        },
                        abort: function () {
                            alert('Erro no processo de pagamento');
                            window.location = '{$PAG_ERRO}/{$REF}';
                                        }
                                    });
                    "> Pague com o Pagseguro
            </button>
            <img src="{$TEMA}/imagens/logopagseguro.png"  alt=""> 
            <script type="text/javascript" src="{$PS_SCRIPT}"></script>
        </div>
        <div class="col-md-4">
        </div>
    </section>
{/if}
