
{foreach from=$PRO item=P}
            <h3 class="text-center">{$P.produto_nome} - Ref: {$P.produto_referencia}</h3>
            <hr>
            <div class="row">
                {*  div da esquerda imagem do produto  *}
                <div class="col-md-6" >
                    <img class="thumbnail" src="{$P.produto_imagem_grande}" alt="{$P.produto_nome}"> 
                </div>
                {*    div da direita info produtos    *}
                <div class="col-md-6 thumbnail">
                    <img src="{$TEMA}/imagens/logopagseguro.png" alt="">
                    <hr>
                    <div class="col-md-6">
                        <h3 class="text-center preco">R$ {$P.produto_valor}</h3>   
                    </div>
                    
                    {*BOTAO COMPRAR*}
                    <div class="col-md-6">
                        <form name="carrinho" method="post" action="{$PAG_COMPRAR}">
                            <input type="hidden" name="produto_id" value="{$P.produto_id}">
                            <input type="hidden" name="acao" value="add">
                            <button  class="btn btn-success btn-lg">Comprar</button>
                        </form> 
                    </div>
                    {*FIM DO BOTÃO COMPRAR*}        
                            
                </div>
            </div>
            <!-- -->
            {*  listagem de imagens extras  *}
            <div class="row">
                <hr>
                <h4 class="text-center">Mais imagens</h4>
                <ul style="list-style: none">
                    
                    {foreach from=$IMAGES item=I}
                    
                    <li class="col-md-3 ">
                        <img src="{$I.imagem_nome}" alt="" class="thumbnail">
                    </li>
                    {/foreach}
                </ul>
            </div>
            {*    <!-- descrição do produto-->  *}
            <div class="row">
                <hr>
                <h4 class="text-center">Descrição do produto</h4>
                {$P.produto_descricao} 
            </div>  
            <br>
            <br>
{/foreach}