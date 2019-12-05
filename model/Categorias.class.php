<?php

Class Categorias extends conexao {

    //variáveis globais
    protected $categoria_id,
            $categoria_nome,
            $categoria_slug;

    //construtor desta classe
    function __construct() {
        //chama o construtor da classe extendida(Conexao).
        parent::__construct();
    }

    function GetCategorias() {

        $query = "SELECT * FROM {$this->prefix}categorias";

        $this->ExecuteSQL($query);

        $this->GetLista();
    }

    function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'categorias_id' => $lista['categorias_id'],
                'categoria_nome' => $lista['categoria_nome'],
                'categoria_slug' => $lista['categoria_slug'],
                'categoria_link_admin' => Rotas::pag_ProdutosADMIN() . '/' . $lista['categorias_id'] . '/' . $lista['categoria_slug'],
                'categoria_link' => Rotas::pag_Produtos() . '/' . $lista['categorias_id'] . '/' . $lista['categoria_slug']
            );
            $i++;
        endwhile;
    }

    function Inserir($categorias_nome) {
        // trato os campos
        $this->setCategorias_nome($categorias_nome);
        $this->setCategorias_slug($categorias_nome);
        // monto a SQL
        $query = " INSERT INTO {$this->prefix}categorias (categoria_nome, categoria_slug )";
        $query .= " VALUES (:categoria_nome, :categoria_slug )";
        // passo so parametros
        $params = array(':categoria_nome' => $this->getCategorias_nome(),
            ':categoria_slug' => $this->getCategorias_slug(),
        );
        // executo a minha SQL
        if ($this->ExecuteSQL($query, $params)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    //MÉTODOS GET E SET CATEGORIAS
    function getCategorias_nome() {
        return $this->categorias_nome;
    }

    function getCategorias_slug() {
        return $this->categorias_slug;
    }

    function setCategorias_nome($categorias_nome) {
        $this->categorias_nome = filter_var($categorias_nome, FILTER_SANITIZE_STRING);
    }

    function setCategorias_slug($categorias_slug) {
        $this->categorias_slug = Sistema::GetSlug($categorias_slug);
    }

//FUNCAO EDITAR
    function Editar($categorias_id, $categorias_nome) {
        // trato os campos
        $this->setCategorias_nome($categorias_nome);
        $this->setCategorias_slug($categorias_nome);
        // monto a SQL
        $query = " UPDATE {$this->prefix}categorias ";
        $query .= " SET categoria_nome = :categoria_nome, categoria_slug = :categoria_slug ";
        $query .= " WHERE categorias_id = :categorias_id ";
        // passo so parametros
        $params = array(':categoria_nome' => $this->getCategorias_nome(),
            ':categoria_slug' => $this->getCategorias_slug(),
            ':categorias_id' => (int) $categorias_id,
        );
        // executo a minha SQL
        if ($this->ExecuteSQL($query, $params)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    //FUNÇÃO APAGAR CATEGORIAS
    function Apagar($categorias_id) {
        // verifico se  tenho itens antes de apagar a categoria
        $pro = new Produtos();
        $pro->GetProdutosCategoriaID($categorias_id);
        if ($pro->TotalDados() > 0):
            echo '<div class="alert alert-danger" > Esta categoria tem: ';
            echo $pro->TotalDados();
            echo ' produtos. Não pode ser apagada, para apagar precisa primeiro apagar os produtos dela </div>';
        // se nao tiver produtos nela  eu apago 
        else:
            // monto a SQL
            $query = " DELETE FROM {$this->prefix}categorias";
            $query .= " WHERE categorias_id = :id";
            // passo os parametros
            $params = array(':id' => (int) $categorias_id);
            // executo a SQL
            if ($this->ExecuteSQL($query, $params)):
                return TRUE;
            else:
                return FALSE;
            endif;
        endif;
    }

}


