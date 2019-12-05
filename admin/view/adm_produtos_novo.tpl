<script src="{$GET_TEMA}/tema/js/tinymce/tinymce.min.js"></script>
<h4 class="text-center"> Adicionar novo produto </h4>
<hr>
<!-- começa os campos para form produto    -->
<section class="row" id="camposproduto">
    <form name="frm_produto" method="post" action=""  enctype="multipart/form-data">{* //enctype obrigatorio para envio de imagem*}
        <div class="col-md-6">
            <label>Produto</label>
            <input type="text" name="produto_nome" id="produto_nome" class="form-control"  required >
        </div>
        <div class="col-md-4">
            <label>Catogoria</label>
            <select name="produto_categoria" id="produto_categoria" class="form-control" required>
                <option value="teste"> Escolha </option>                           
                {foreach from=$CATEGORIAS item=C}                    
                    <option value="{$C.categorias_id}">{$C.categoria_nome}</option>  
                {/foreach}                
            </select>
        </div>
        <div class="col-md-2">
            <label>Ativo</label>
            <select name="produto_ativo" id="produto_ativo" class="form-control" required>
                <option value=""> Escolha </option>
                <option value="NAO"> Não </option>
                <option value="SIM"> Sim </option>
            </select>
        </div>
        <div class="col-md-3">
            <label>Modelo</label>
            <input type="text" name="produto_modelo" id="produto_modelo" class="form-control" required >
        </div>
        <div class="col-md-2">
            <label>Referencia</label>
            <input type="text" name="produto_referencia" id="produto_referencia" class="form-control"  required>
        </div>
        <div class="col-md-2">
            <label>Valor</label>
            <input type="text" name="produto_valor" id="produto_valor" class="form-control" required >
        </div>
        <div class="col-md-2">
            <label>Estoque</label>
            <input type="text" name="produto_estoque" id="produto_estoque" class="form-control" required >
        </div>
        <div class="col-md-2">
            <label>Peso</label>
            <input type="text" name="produto_peso" id="produto_peso" class="form-control" required >
        </div>
        <div class="col-md-2">
            <label>Altura</label>
            <input type="text" name="produto_altura" id="produto_altura" class="form-control" required >
        </div>
        <div class="col-md-2">
            <label>Largura</label>
            <input type="text" name="produto_largura" id="produto_largura" class="form-control" required >
        </div>
        <div class="col-md-2">
            <label>Comprimento</label>
            <input type="text" name="produto_comprimento" id="produto_comprimento" class="form-control" required >
        </div>
        <div class="col-md-12">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <hr>
                <label>Imagem Principal</label>
                <input type="file" name="produto_imagem" class="form-control " id="produto_imagem">
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div class="col-md-12">
            <label>Descrição</label>
            <textarea name="produto_descricao" id="produto_descricao" rows="5" class="form-control" ></textarea>
            <script>
               tinymce.init ({ selector: '#produto_descricao'});  
            </script>
        </div>
        <div class="col-md-12">
            <label>Slug</label>
            <input type="text" readonly name="produto_slug" id="produto_slug"   class="form-control" >
        </div>
        <!-- botão gravar -->
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <br>
            <button class="btn btn-success btn-block btn-lg" name="btn_gravar"> Gravar </button>
        </div>
        <div class="col-md-4">
        </div>
    </form>
</section>
<br>
<br>
<br>
<br>


