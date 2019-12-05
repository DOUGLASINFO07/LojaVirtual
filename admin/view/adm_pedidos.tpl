<h4 class="text-center"> Gerenciar Pedidos </h4>
<hr>
{if $TESTE > 0}
    
    {else}
<div style="padding-left: 30px" >
    <section class="row" id="pesquisa">
        <!---  faz  uma busca entre datas --->
        <label style="padding-left: 15px"> Buscar entre datas</label>
        <form name="buscardata" method="post" action="">
            <div class="col-md-3" >            
                <input type="date" name="data_ini" class="form-control" required>
            </div> 
            <div class="col-md-3" > 
                <input type="date" name="data_fim" class="form-control" required>
            </div> 
            <div class="col-md-3" > 
                <button class="btn btn-success"> Buscar </button>
            </div> 
            <div class="col-md-3">    
            </div>
        </form>
    </section>
    <br>
    <section class="row">
        <!--- faz  uma busca  por texto ---> 
        <label style="padding-left: 15px"> Buscar por Referencia</label>
        <form name="buscarrefcod" method="post" action="">  
            <div class="col-md-4" >
                <input type="text" name="txt_ref" class="form-control" required>   
            </div>
            <div class="col-md-3" >
                <button class="btn btn-success"> Buscar </button>   
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
        </form>
</div>
</section>
    {/if}
<hr>
<section class="row" id="pedidos">
    <center>
        <table class="table table-bordered " style="width: 90%">
            <tr class="text-success bg-success">
                <td>Cliente</td>
                <td>Data</td>
                <td>Hora</td>
                <td>Ref</td>
                <td>Status</td>
                <td></td>
                <td></td>
            </tr>
            {foreach from=$PEDIDOS item=P}
                <tr>
                    <td >{$P.clientes_nome} {$P.clientes_sobrenome}</td>
                    <td style="width: 10%">{$P.pedidos_data}</td>
                    <td style="width: 10%">{$P.pedidos_hora}</td>
                    <td style="width: 10%">{$P.pedidos_ref}</td>
                    {if $P.pedidos_pag_status == 'NAO'} 
                        <td style="width: 15%"><span class="label label-danger">{$P.pedidos_pag_status}</span></td>
                        {else}
                        <td style="width: 15%">{$P.pedidos_pag_status}</td>
                    {/if}
                    <td style="width: 10%">
                        <!---- formulario que vai para itens do pedido ---->
                        <form name="itens" method="post" action="{$PAG_ITENS}">
                            <input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.pedidos_cod}">
                            <button class="btn btn-info"><i class="glyphicon glyphicon-menu-hamburger"></i> Detalhes</button>
                        </form> 
                    </td>
                    <td>
                        <form name="deletar" method="post" action="">
                            <input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.pedidos_cod}">
                            <button class="btn btn-danger" name="pedidos_apagar" value="pedidos_apagar"><i class="glyphicon glyphicon-remove"></i> </button>
                        </form> 
                    </td>
                </tr>
            {/foreach}
        </table>
    </center>
</section>
<!--  paginação inferior   -->  
<section id="pagincao" class="row">
    <center>
        {$PAGINACAO}
    </center>
</section>