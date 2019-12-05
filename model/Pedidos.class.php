<?php

class Pedidos extends conexao {

    function __construct() {
        parent::__construct();
    }

    function PedidoGravar($cliente, $codigo, $referencia, $freteValor = null, $freteTipo = null) {
        $retorno = FALSE;
        $query = "INSERT INTO " . $this->prefix . "pedidos ";
        $query .= "(pedidos_data, pedidos_hora, pedidos_cliente, pedidos_cod, pedidos_ref, pedidos_frete_valor, pedidos_frete_tipo, pedidos_pag_status)";
        $query .= " VALUES ";
        $query .= "(:data, :hora, :cliente, :cod, :ref, :frete_valor, :frete_tipo, :pedidos_pag_status)";
        $params = array(
            ':data' => Sistema::DataAtualUS(),
            ':hora' => Sistema::HoraAtual(),
            ':cliente' => (int) $cliente,
            ':cod' => $codigo,
            ':ref' => $referencia,
            ':frete_valor' => $freteValor,
            ':frete_tipo' => $freteTipo,
            ':pedidos_pag_status' =>'PENDENTE PAGTO' 
        );
        $this->ExecuteSQL($query, $params);
        //gravar os itens do pedido
        $this->ItensGravar($codigo);
        $retorno = TRUE;
        return $retorno;
    }

    function GetPedidosCliente($cliente = null) {
        $query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c";
        $query .= " ON p.pedidos_cliente = c.clientes_id";
        if ($cliente != null) {
            $cli = (int) $cliente;
            $query .= " WHERE pedidos_cliente = {$cli}";
            $query .= " ORDER BY pedidos_id DESC";
            $query .= $this->PaginacaoLinks("pedidos_id", $this->prefix . "pedidos WHERE pedidos_cliente = " . (int) $cli);
        } else {
            $query .= $this->PaginacaoLinks("pedidos_id", $this->prefix . "pedidos");
        }
        $this->ExecuteSQL($query);
        $this->GetLista();
    }

    function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
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
                'clientes_nome' => $lista['clientes_nome'],
                'clientes_sobrenome' => $lista['clientes_sobrenome'],
            );
            $i++;
        endwhile;
    }

    function ItensGravar($codpedido) {
        $carrinho = new Carrinho();
        foreach ($carrinho->GetCarrinho() as $item) {
            $query = "INSERT INTO " . $this->prefix . "pedidos_itens ";
            $query .= "(item_produto, item_valor, item_qtd, item_ped_cod)";
            $query .= "VALUES  (:produto,:valor,:qtd,:cod)";
            $params = array(
                ':produto' => $item['produto_id'],
                ':valor' => $item['produto_valor_us'],
                ':qtd' => (int) $item['produto_quantidade'],
                ':cod' => $codpedido
            );
            $this->ExecuteSQL($query, $params);
        }
    }

    function LimparSessoes() {
        unset($_SESSION['PRO']);
        unset($_SESSION['PED']['pedidos']);
        unset($_SESSION['PED']['ref']);
    }

    function Apagar($ped_cod) {
        // apagando o PEDIDO  
        // monto a minha SQL de apagar o pedido 
        $query = " DELETE FROM {$this->prefix}pedidos WHERE pedidos_cod = :pedidos_cod";
        // parametros
        $params = array(':pedidos_cod' => $ped_cod);
        // executo a minha SQL
        $this->ExecuteSQL($query, $params);
        /// apos apagar o pedido apaga ITENS DO PEDIDO  
        // monto a minha SQL de apagar os items 
        $query = " DELETE FROM {$this->prefix}pedidos_itens WHERE item_ped_cod = :pedidos_cod";
        // parametros
        $params = array(':pedidos_cod' => $ped_cod);
        // executo a minha SQL
        if ($this->ExecuteSQL($query, $params)):
            return TRUE;
        endif;
    }

    function GetPedidosREF($ref) {
        // monto a SQL
        $query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c";
        $query .= " ON p.pedidos_cliente = c.clientes_id";
        $query .= " WHERE pedidos_ref = :ref";
        $query .= $this->PaginacaoLinks("pedidos_id", $this->prefix . "pedidos WHERE pedidos_ref = " . $ref);
        // passando parametros
        $params = array(':ref' => $ref);
        // executando a SQL                      
        $this->ExecuteSQL($query, $params);
        // trazendo a listagem 
        $this->GetLista();
    }

    function GetPedidosDATA($data_ini, $data_fim) {
        // montando a SQL
        $query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c";
        $query .= " ON p.pedidos_cliente = c.clientes_id";
        $query .= " WHERE pedidos_data between :data_ini AND :data_fim";
        $query .= $this->PaginacaoLinks("pedidos_id", $this->prefix . "pedidos WHERE pedidos_data between " . $data_ini . " AND " . $data_fim);
        // passando os parametros  
        $params = array(':data_ini' => $data_ini, ':data_fim' => $data_fim);
        // executando a SQL
        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }

}
