<h4 class="text-center"> Gerenciar categorias </h4>
<hr>
<section class="row">
    <form name="categoriainsere" method="post" action="">
        <div class="col-md-4">
            <input type="text" name="categorias_nome" class="form-control" required>  
        </div>
        <div class="col-md-4">
            <button class="btn btn-success" name="categorias_nova" value="categorias_nova"> Inserir nova </button>
        </div>
        <div class="col-md-4"></div>
    </form>
</section>
<hr>
<!-- section listar categorias -->
<section class="row" id="listarcategorias">
    <center>
        <table class="table table-bordered" style="width: 90%">
            {foreach from=$CATEGORIAS item=C}
                <form name="categorias_editar" method="post" action="">
                    <tr>
                        <td style="width: 70%">
                            <input type="text" name="categorias_nome" value="{$C.categoria_nome}" class="form-control" required> 
                            <input type="hidden" name="categorias_id" value="{$C.categorias_id}">
                        </td>
                        <td>
                            <button class="btn btn-success" name="categorias_editar" value="categorias_editar">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-danger" name="categorias_apagar" value="categorias_apagar">Apagar</button>
                        </td>
                    </tr>        
                </form>
            {/foreach}
        </table>
    </center>
</section>
