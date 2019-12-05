<script src="{$GET_TEMA}/tema/js/tinymce/tinymce.min.js"></script>      
<h4 class="text-center"> Editar produto </h4>
<hr>
<!-- começa os campos para form produto    -->
<section class="row" id="camposproduto">
    <!--  enctype="multipart/form-data"  -->
    <form name="frm_produto" method="post" action=""  enctype="multipart/form-data">
        <div class="col-md-6">
            <label>Produto</label>
            <input type="text" name="produto_nome" id="produto_nome" class="form-control"  required value="{$PRO.1.produto_nome}">
        </div>
        <div class="col-md-4">
            <label>Catogoria</label>
            <select name="produto_categoria" id="produto_categoria" class="form-control" required>
                <option value="{$PRO.1.categorias_id}"> {$PRO.1.categoria_nome} </option>                           
                <option value=""> Escolha</option>                           
                {foreach from=$CATEGORIAS item=C}                    
                    <option value="{$C.categorias_id}">{$C.categoria_nome}</option>                                        
                {/foreach}                
            </select>
        </div>
        <div class="col-md-2">
            <label>Ativo</label>
            <select name="produto_ativo" id="produto_ativo" class="form-control" required >
                <option value="{$PRO.1.produto_ativo}"> {$PRO.1.produto_ativo} </option>
                <option value=""> Escolha </option>
                <option value="NAO"> Não </option>
                <option value="SIM"> Sim </option>
            </select>
        </div>
        <div class="col-md-3">
            <label>Modelo</label>
            <input type="text" name="produto_modelo" id="produto_modelo" class="form-control " value="{$PRO.1.produto_modelo}"  >
        </div>
        <div class="col-md-2">
            <label>Referencia</label>
            <input type="text" name="produto_referencia" id="produto_referencia" class="form-control" value="{$PRO.1.produto_referencia}" >
        </div>
        <div class="col-md-2">
            <label>Valor</label>
            <input type="text" name="produto_valor" id="produto_valor" class="form-control" required value="{$PRO.1.produto_valor}">
        </div>
        <div class="col-md-2">
            <label>Estoque</label>
            <input type="text" name="produto_estoque" id="produto_estoque" class="form-control" required value="{$PRO.1.produto_estoque}">
        </div>
        <div class="col-md-2">
            <label>Peso</label>
            <input type="text" name="produto_peso" id="produto_peso" class="form-control" required value="{$PRO.1.produto_peso}">
        </div>
        <div class="col-md-2">
            <label>Altura</label>
            <input type="text" name="produto_altura" id="produto_altura" class="form-control" required value="{$PRO.1.produto_altura}">
        </div>
        <div class="col-md-2">
            <label>Largura</label>
            <input type="text" name="produto_largura" id="produto_largura" class="form-control" required value="{$PRO.1.produto_largura}">
        </div>
        <div class="col-md-2">
            <label>Comprimento</label>
            <input type="text" name="produto_comprimento" id="produto_comprimento" class="form-control" required value="{$PRO.1.produto_comprimento}">
        </div>
        <div class="col-md-12">

            <div class="col-md-4">
                <hr> 
                <img src="{$PRO.1.produto_imagem}" class="thumbnail" alt="">
            </div>
            <div class="col-md-4">
                <hr>
                <label>Imagem Principal</label>
                <!--- campos para adicionar a imagem---->
                <input type="file" name="produto_imagem" class="form-control btn btn-success" id="produto_imagem">
                <!--pega o nome da imagem atual -->
                <input type="hidden" name="produto_imagem_atual" id="produto_imagem_atual" value="{$PRO.1.produto_imagem_atual}">
                <!----pega o caminho completo da imagem atual -->
                <input type="hidden" name="produto_imagem_arquivo" id="produto_imagem_arquivo" value="{$PRO.1.produto_imagem_arquivo}">
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="col-md-12">
            <label>Descrição</label>

            <textarea name="produto_descricao" id="produto_descricao" rows="5" class="form-control" >{$PRO.1.produto_descricao}</textarea>
            <script>
                tinymce.init({ selector: '#produto_descricao' });
            </script> 
        </div>
        <div class="col-md-12">
            <label>Slug</label>
            <input type="text" readonly name="produto_slug" id="produto_slug"   class="form-control" value="{$PRO.1.produto_slug}">
        </div>
        <!-- botão gravar -->
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <br>
            <button class="btn btn-success btn-block btn-lg" name="btn_editar"> Confirmar </button>
        </div>
        <div class="col-md-4 text-right">
        </div>
        <input type="hidden" name="produto_id" value="{$PRO.1.produto_id}">
    </form>
</section>
<!---bloco de apagar o produto -->
<section class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4 text-right">
        <!--- botão que abre a opção de apagar -->
        <br>
        <button class="btn btn-danger " name="btn_apagar" data-toggle="collapse" data-target="#btnapagar" ><i class="glyphicon glyphicon-remove"></i> Apagar Produto</button> 
    </div>
    <div class="col-md-12 text-center collapse alert alert-danger" id="btnapagar">
        <br>
        <form name="frm_apagar" method="post" action="">
            <label>Apagar este produto?</label>
            <input type="radio" name="confirmar" value="SIM" required>
            <!---botao que apagar o produto de uma vez -->
            <button class="btn btn-danger " name="btn_apagar"><i class="glyphicon glyphicon-remove"></i> OK </button> 
            <input type="hidden" name="produto_id_apagar" value="{$PRO.1.produto_id}">
            <input type="hidden" name="produto_apagar" value="SIM">
            <!----pega o caminho completo da imagem atual -->
            <input type="hidden" name="produto_imagem_arquivo" id="produto_imagem_arquivo" value="{$PRO.1.produto_imagem_arquivo}">
        </form>
    </div>
</section>
<br>
<br>
<br>
<br>


