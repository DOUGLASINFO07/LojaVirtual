<h4 class="text-center">Gerenciar Clientes </h4>
<hr>
<!--- listando clientes ---->
<section class="row">
    <center>
        <table class="table table-bordered">
            <tr class="text-success bg-success">
                <td></td>
                <td>Nome</td>
                <td>Email </td>
                <td>Fone </td>
                <td>Data cad</td>
                <td></td>
            </tr>
            {foreach from=$CLIENTES item=C}
                <tr>
                    <td><a href="{$PAG_PEDIDOS}/{$C.clientes_id} " class="btn btn-info">Pedidos</a> </td>
                    <td>{$C.clientes_nome} {$C.clientes_sobrenome}</td>
                    <td>{$C.clientes_email}</td>
                    <td>{$C.clientes_fone}</td>
                    <td>{$C.clientes_data_cad}</td>
                    <td>
                        <a href="{$PAG_EDITAR}/{$C.clientes_id}" class="btn btn-info"> Ver </a>
                    </td>
                </tr>
            {/foreach}
        </table>
    </center >
</section>