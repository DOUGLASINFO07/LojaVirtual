{*{if $PRO_TOTAL < 1 }
<H4 class="alert alert-danger"> Nenhum produto encontrado!!</h4>
{/if}*}
<!--  começa lista de produtos  ---->   
<section id="produtos" class="row">  
    <ul style="list-style: none" >
        <div class="row" id="pularliha" >
            {foreach from = $PRO item=P}
                <li class="col-md-4">
                    <div class="thumbnail" id="thumbnail" >
                        <a href="{$PRO_INFO}/{$P.produto_id}/{$P.produto_slug}">
                            <img src="{$P.produto_imagem}" alt="" class="img img-responsive img-rounded" > 
                            <div class="caption">
                                <h4 class="text-center">{$P.produto_nome}</h4> 
                                <h3 class="text-center text-danger">R$ {$P.produto_valor}</h3>
                            </div>
                        </a>
                    </div>
                </li>
            {/foreach}
        </div>
    </ul>
</section>
<!--  paginação inferior   -->  
<section id="pagincao" class="row">
    <center>
        {$PAGINAS}
    </center>
</section>