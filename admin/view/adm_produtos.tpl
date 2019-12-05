<h4 class="text-center">Gerenciar Produtos</h4>
<hr>
<section class="row ">
    <div class="col-md-4"> </div>
    <div class="col-md-4"> </div>
    <div class="col-md-4 text-right">
        <a href="{$PAG_PRODUTO_NOVO}" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Novo Produto</a>
    </div>
</section>
<br>
<!--     exibe mensagem caso nao encontre produtos -->
{*{if $PRO_TOTAL < 1}
    <h4 class="alert alert-danger">Ops... Nada foi encontrado </h4>  
{/if}*}
<!--  começa lista de produtos  ---->   
<section id="produtos" class="row">  
    <table class="table table-bordered">  
        <tr class="bg-success text-success">
            <td></td> 
            <td>Produto</td> 
            <td>Categoria</td> 
            <td>Preço</td> 
            <td>      </td>      
            <td>      </td>      
        </tr>
        {foreach from=$PRO item=P}
            <tr>
                <td>  <img src="{$P.produto_imagem}" alt="" > </td>
                <td> {$P.produto_nome}</td>
                <td>{$P.categoria_nome}</td>
                <td class="text-right">R$ {$P.produto_valor}</td>
                <td>
                    <form name="proeditar" method="post" action="{$PAG_PRODUTO_EDITAR}">
                        <input type="hidden" name="produto_id" id="produto_id" value="{$P.produto_id}">
                        <button class="btn btn-success"> <i class="glyphicon glyphicon-pencil"></i> </button>
                    </form>  
                </td>
                <td>
                    <form name="proimg" method="post" action="{$PAG_PRODUTO_IMG}">
                        <input type="hidden" name="produto_id" id="produto_id" value="{$P.produto_id}">
                        <input type="hidden" name="produto_nome" id="produto_nome" value="{$P.produto_nome}">
                        <button class="btn btn-info"> <i class="glyphicon glyphicon-picture"></i> </button>
                    </form>  
                </td>
            </tr>
        {/foreach}
    </table>
</section>
<!--  paginação inferior   -->  
<section id="pagincao" class="row">
    <center>
        {$PAGINAS}
    </center>
</section>


