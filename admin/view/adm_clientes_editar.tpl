<h3>Dados do Cliente</h3>
<hr>
<form name="cadcliente" id="cadcliente" method="post" action="">
    <section class="row" id="cadastro">
        <div class="col-md-4">
            <label>Nome:</label>
            <input type="text" value="{$CLIENTES_NOME}" name="clientes_nome" class="form-control" minlength="3" required>
        </div>
        <div class="col-md-4">
            <label>Sobrenome:</label>
            <input type="text" value="{$CLIENTES_SOBRENOME}" name="clientes_sobrenome" class="form-control"  minlength="3" required>
        </div>
        <div class="col-md-3">
            <label>Data Nasc:</label>
            <input type="date" value="{$CLIENTES_DATA_NASC}" name="clientes_data_nasc" class="form-control" required>
        </div>
        <div class="col-md-2">
            <label>RG:</label>
            <input type="text" value="{$CLIENTES_RG}" name="clientes_rg" class="form-control" required>
        </div>
        <div class="col-md-2">
            <label>CPF:</label>
            <input type="text" value="{$CLIENTES_CPF}" name="clientes_cpf" class="form-control" minlength="11" maxlength="11" required >
        </div>
        <div class="col-md-2">
            <label>DDD:</label>
            <input type="number" value="{$CLIENTES_DDD}" name="clientes_ddd" class="form-control"  min="10" max="99" required>
        </div>
        <div class="col-md-3">
            <label>Fone:</label>
            <input type="number" value="{$CLIENTES_FONE}" name="clientes_fone" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label>Celular:</label>
            <input type="number" value="{$CLIENTES_CELULAR}" name="clientes_celular" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label>Endereço:</label>
            <input type="text" value="{$CLIENTES_ENDERECO}" name="clientes_endereco" class="form-control"  minlength="3" required>
        </div>
        <div class="col-md-2">
            <label>Numero:</label>
            <input type="text" value="{$CLIENTES_NUMERO}" name="clientes_numero" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>Bairro:</label>
            <input type="text" value="{$CLIENTES_BAIRRO}" name="clientes_bairro" class="form-control" minlength="3" required>
        </div>
        <div class="col-md-4">
            <label>Cidade:</label>
            <input type="text" value="{$CLIENTES_CIDADE}" name="clientes_cidade" class="form-control" minlength="3" required>
        </div>
        <div class="col-md-2">
            <label>UF:</label>
            <input type="text" value="{$CLIENTES_UF}"name="clientes_uf" class="form-control" maxlength="2" minlength="2" required>
        </div>
        <div class="col-md-2">
            <label>Cep:</label>
            <input type="text" value="{$CLIENTES_CEP}" name="clientes_cep" class="form-control" minlength="8" maxlength="8" required>
        </div>
        <div class="col-md-4">
            <label>Email:</label>
            <input type="email" value="{$CLIENTES_EMAIL}" name="clientes_email" class="form-control" required>
        </div>
    </section>
    <br>
    <br>
    <section class="row" id="btngravar">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <input type="hidden" name="clientes_id" id="clientes_id" class="form-control" value="{$CLIENTES_ID}" required>
            <br>
            <button type="submit" class="btn btn-warning btn-block "> <i class="glyphicon glyphicon-ok"></i> Gravar </button>
        </div>
        <div class="col-md-4"></div>
    </section>
</form>
<br>
<br>
<br>
<br>


