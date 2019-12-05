<?php

class itens extends conexao {

    function __construct() {
        parent::__construct();
    }

    function GetItensPedido($pedido, $cliente = null) {
        $query = " SELECT * FROM {$this->prefix}pedidos p, {$this->prefix}pedidos_itens i, {$this->prefix}produtos d";
        $query .= " WHERE p.pedidos_cod = i.item_ped_cod AND i.item_produto = d.produto_id";
        $query .= " AND p.pedidos_cod = :pedido";

        if ($cliente != null) {
            $query .= " AND p.pedidos_cliente = :cliente";
            $params[':cliente'] = (int) $cliente;
        }

        $params[':pedido'] = $pedido;
        $this->ExecuteSQL($query, $params);

        $this->GetLista();
    }

    private function GetLista() {

        $i = 1;
        while ($lista = $this->ListarDados()):

            $sub = $lista['item_valor'] * $lista['item_qtd'];
            $this->total_valor += $sub;

            $this->itens[$i] = array(
                'pedidos_id' => $lista['pedidos_id'],
                'pedidos_data' => Sistema::Fdata($lista['pedidos_data']),
                'pedidos_data_us' => $lista['pedidos_data'],
                'pedidos_hora' => $lista['pedidos_hora'],
                'pedidos_cliente' => $lista['pedidos_cliente'],
                'pedidos_cod' => $lista['pedidos_cod'],
                'pedidos_ref' => $lista['pedidos_ref'],
                'pedidos_pag_status' => $lista['pedidos_pag_status'],
                'pedidos_pag_forma' => $lista['pedidos_pag_forma'],
                'pedidos_pag_tipo' => $lista['pedidos_pag_tipo'],
                'pedidos_pag_codigo' => $lista['pedidos_pag_codigo'],
                'pedidos_frete_valor' => $lista['pedidos_frete_valor'],
                'pedidos_frete_tipo' => $lista['pedidos_frete_tipo'],
                'item_id' => $lista['item_id'],
                'item_nome' => $lista['produto_nome'],
                'item_valor' => Sistema::MoedaBR($lista['item_valor']),
                'item_valor_us' => $lista['item_valor'],
                'item_qtd' => $lista['item_qtd'],
                'item_img' => Rotas::ImageLink($lista['produto_imagem'], 60, 60),
                'item_sub' => Sistema::MoedaBR($sub),
                'item_sub_us' => $sub,
            );
            $i++;
        endwhile;
    }

    function GetTotal() {
        return $this->total_valor;
    }

}
