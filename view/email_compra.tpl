<style>
    .tabela {
        border-collapse: collapse;
        width: 100%;
    }
    .tabela th, td {
        text-align: left;
        padding: 8px;
    }
    .tabela tr:nth-child(odd){
        background-color: #b2b2b2;
    }
    .sessao{

        padding:20px;
    }
    .total{
        text-align:right;
    }
    .frete{
        text-align:right;
    }
    .totalfrete{
        text-align:right;
        font-size:18px;
        font-style: bold;
        color:#062a46;
    }
    .textoinicio{
        text-align:center;
    }
    .minhaconta{
        text-align:center;
    }
</style>
<h3> Olá {$NOME_CLIENTE} , obrigado pela sua compra em {$SITE_NOME} <br>
    <a href="{$SITE_HOME}"> {$SITE_HOME} </a>
</h3>
<section class="row">
    <h4>
        Para acessar a sua conta e ter um histórico de seus pedidos acesse nosso site, e sua conta<br>
        <a  href="{$PAG_MINHA_CONTA}" > Minha conta: {$PAG_MINHA_CONTA} </a>
    </h4>                 
</section>
<section class="row ">
    <center>
        <div class="alert alert-success"> <h3>Itens do seu pedido</h3> </div> 
        <br>
        <table class="table table-bordered" style="width: 95%;">
            {foreach from=$PRO item=P}
                <tr style="border: 1px solid #b2dba1">
                    <td> <img src="{$P.produto_imagem}" alt=" {$P.produto_nome} "> </td> 
                    <td>  {$P.produto_nome}  </td>
                    <td>  {$P.produto_valor} </td>
                    <td>  {$P.produto_quantidade}   </td>
                    <td>  {$P.produto_subTotal} </td>
                </tr>
            {/foreach}
        </table>
    </center>
</section><!-- fim da listagem itens -->
<!-- botoes de baixo e valor total -->
<section class="row">
    <div class="col-md-4 text-right">
    </div>
    <div class="col-md-4 text-right">
    </div>
    <!-- botão de limpar-->
    <div class="col-md-4 text-right  text-danger bg-warning">
        <h4>
            Total : R$ {$TOTAL}
        </h4>
        <h4>
            Frete : R$ {$FRETE}
        </h4>
        <h4>
            Preço Final : R$ {$TOTAL_FRETE}
        </h4>
    </div>
</section>
<br>


