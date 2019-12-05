<BR>
<section class="row" id="pedidos">
    <h4 class="text-center">Meus Pedidos</h4>
    <center>
        {if $PEDIDOS_QUANTIDADE > 0}
            <table class="table table-bordered" style="width: 90%">
                <tr class="text-danger bg-danger">
                    <td>Data</td>
                    <td>Hora</td>
                    <td>Ref</td>
                    <td>Status</td>
                    <td></td>
                </tr>
                {foreach from=$PEDIDOS item=P}
                    <tr>
                        <td style="width: 10%">{$P.pedidos_data}</td>
                        <td style="width: 10%">{$P.pedidos_hora}</td>
                        <td style="width: 10%">{$P.pedidos_ref}</td>
                        {if $P.pedidos_pag_status == 'PENDENTE PAGTO'} 
                            <td style="width: 15%"><span class="label label-danger">{$P.pedidos_pag_status}</span></td>
                            {elseif $P.pedidos_pag_status == 'Paga'}
                            <td style="width: 15%"><span class="label label-success">{$P.pedidos_pag_status}</span></td>
                            {elseif $P.pedidos_pag_status == 'Aguardando pagamento'}
                            <td style="width: 15%"><span class="label label-warning">{$P.pedidos_pag_status}</span></td>
                            {else}
                            <td style="width: 15%">{$P.pedidos_pag_status}</td>
                        {/if}
                    <form name="itens" method="post" action="{$PAG_ITENS}">
                        <input type="hidden" name="pedidos_cod" id="pedidos_cod" value="{$P.pedidos_cod}">
                        <td style="width: 10%"><button class="btn btn-default"><i class="glyphicon glyphicon-menu-hamburger"></i> Detalhes</button></td>
                    </form>    
                    </tr>
                {/foreach}
            </table>
        {else}
            Você não tem nenhum pedido ainda!
        {/if}
    </center>
</section>

<!--  paginação inferior   -->  
<section id="pagincao" class="row">
    <center>
        {$PAGINAS}
    </center>
</section>