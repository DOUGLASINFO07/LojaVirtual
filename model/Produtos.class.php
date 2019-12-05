<?php

Class Produtos extends Conexao {

    private $produto_nome,
            $produto_categoria,
            $produto_ativo,
            $produto_modelo,
            $produto_referencia,
            $produto_valor,
            $produto_estoque,
            $produto_peso,
            $produto_altura,
            $produto_largura,
            $produto_comprimento,
            $produto_imagem,
            $produto_descricao,
            $produto_slug;

    function __construct() {
        parent::__construct();
    }

    function GetProdutos() {
        $query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.produto_categoria = c.categorias_id";
        $query .= " ORDER BY p.produto_id DESC";
        $query .= $this->PaginacaoLinks("produto_id", $this->prefix . "produtos");
        $this->ExecuteSQL($query);
        $this->GetLista();
    }

    function GetProdutosID($id) {
        $query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.produto_categoria = c.categorias_id";
        $query .= " AND produto_id = :id";
        $params = array(':id' => (int) $id);
        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }

    function GetProdutosCategoriaID($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.produto_categoria = c.categorias_id";
        $query .= " AND produto_categoria = :id";
        $params = array(':id' => (int) $id);
        $query .= $this->PaginacaoLinks("produto_id", $this->prefix . "produtos WHERE produto_categoria = " . (int) $id);
        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }

    function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'produto_id' => $lista['produto_id'],
                'produto_nome' => $lista['produto_nome'],
                'produto_descricao' => $lista['produto_descricao'],
                'produto_peso' => $lista['produto_peso'],
                'produto_valor' => Sistema::MoedaBR($lista['produto_valor']),
                'produto_valor_us' => $lista['produto_valor'],
                'produto_altura' => $lista['produto_altura'],
                'produto_largura' => $lista['produto_largura'],
                'produto_comprimento' => $lista['produto_comprimento'],
                'produto_imagem' => Rotas::ImageLink($lista['produto_imagem'], 130, 130),
                'produto_imagem_grande' => Rotas::ImageLink($lista['produto_imagem'], 300, 300),
                'produto_imagem_pequena' => Rotas::ImageLink($lista['produto_imagem'], 70, 70),
                'produto_slug' => $lista['produto_slug'],
                'produto_referencia' => $lista['produto_referencia'],
                'categoria_nome' => $lista['categoria_nome'],
                'categorias_id' => $lista['categorias_id'],
                'produto_modelo' => $lista['produto_modelo'],
                'produto_estoque' => $lista['produto_estoque'],
                'produto_ativo' => $lista['produto_ativo'],
                'produto_imagem_arquivo' => Rotas::get_SiteRAIZ() . '/' . Rotas::get_ImagePasta() . $lista['produto_imagem'],
                'produto_imagem_atual' => $lista['produto_imagem']
            );
            $i++;
        endwhile;
    }

    //FUNÇÃO PREPARAR
    function Preparar(
            $produto_nome,
            $produto_categoria,
            $produto_ativo,
            $produto_modelo,
            $produto_referencia,
            $produto_valor,
            $produto_estoque,
            $produto_peso,
            $produto_altura,
            $produto_largura,
            $produto_comprimento,
            $produto_imagem,
            $produto_descricao,
            $produto_slug = null
    ) {
        $this->setProduto_nome($produto_nome);
        $this->setProduto_categoria($produto_categoria);
        $this->setProduto_ativo($produto_ativo);
        $this->setProduto_modelo($produto_modelo);
        $this->setProduto_referencia($produto_referencia);
        $this->setProduto_valor($produto_valor);
        $this->setProduto_estoque($produto_estoque);
        $this->setProduto_peso($produto_peso);
        $this->setProduto_altura($produto_altura);
        $this->setProduto_largura($produto_largura);
        $this->setProduto_comprimento($produto_comprimento);
        $this->setProduto_imagem($produto_imagem);
        $this->setProduto_descricao($produto_descricao);
        $this->setProduto_slug($produto_nome);
    }

    function Inserir() {
        $query = "INSERT INTO {$this->prefix}produtos (produto_nome, produto_categoria, produto_ativo, produto_modelo, produto_referencia,";
        $query .= " produto_valor, produto_estoque, produto_peso , produto_altura, produto_largura, produto_comprimento ,produto_imagem, produto_descricao, produto_slug)";
        $query .= " VALUES ";
        $query .= " ( :produto_nome, :produto_categoria, :produto_ativo, :produto_modelo, :produto_referencia, :produto_valor, :produto_estoque, :produto_peso ,";
        $query .= " :produto_altura, :produto_largura, :produto_comprimento ,:produto_imagem, :produto_descricao, :produto_slug)";
        $params = array(
            ':produto_nome' => $this->getProduto_nome(),
            ':produto_categoria' => $this->getProduto_categoria(),
            ':produto_ativo' => $this->getProduto_ativo(),
            ':produto_modelo' => $this->getProduto_modelo(),
            ':produto_referencia' => $this->getProduto_referencia(),
            ':produto_valor' => $this->getProduto_valor(),
            ':produto_estoque' => $this->getProduto_estoque(),
            ':produto_peso' => $this->getProduto_peso(),
            ':produto_altura' => $this->getProduto_altura(),
            ':produto_largura' => $this->getProduto_largura(),
            ':produto_comprimento' => $this->getProduto_comprimento(),
            ':produto_imagem' => $this->getProduto_imagem(),
            ':produto_descricao' => $this->getProduto_descricao(),
            ':produto_slug' => $this->getProduto_slug()
        );
        if ($this->ExecuteSQL($query, $params)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    function Apagar($id) {
        $query = "DELETE FROM {$this->prefix}produtos WHERE produto_id = :id";
        $params = array(
            ':id' => (int) $id
        );
        if ($this->ExecuteSQL($query, $params)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    function Alterar($id) {
        $query = " UPDATE {$this->prefix}produtos SET produto_nome=:produto_nome, produto_categoria=:produto_categoria,";
        $query .= " produto_ativo=:produto_ativo, produto_modelo=:produto_modelo, produto_referencia=:produto_referencia,";
        $query .= " produto_valor=:produto_valor, produto_estoque=:produto_estoque, produto_peso=:produto_peso , ";
        $query .= " produto_altura=:produto_altura, produto_largura=:produto_largura,";
        $query .= " produto_comprimento=:produto_comprimento ,produto_imagem=:produto_imagem, produto_descricao=:produto_descricao, produto_slug=:produto_slug";
        $query .= " WHERE produto_id = :produto_id";
        $params = array(
            ':produto_nome' => $this->getProduto_nome(),
            ':produto_categoria' => $this->getProduto_categoria(),
            ':produto_ativo' => $this->getProduto_ativo(),
            ':produto_modelo' => $this->getProduto_modelo(),
            ':produto_referencia' => $this->getProduto_referencia(),
            ':produto_valor' => $this->getProduto_valor(),
            ':produto_estoque' => $this->getProduto_estoque(),
            ':produto_peso' => $this->getProduto_peso(),
            ':produto_altura' => $this->getProduto_altura(),
            ':produto_largura' => $this->getProduto_largura(),
            ':produto_comprimento' => $this->getProduto_comprimento(),
            ':produto_imagem' => $this->getProduto_imagem(),
            ':produto_descricao' => $this->getProduto_descricao(),
            ':produto_slug' => $this->getProduto_slug(),
            ':produto_id' => (int) $id
        );
        // executo a SQL
        if ($this->ExecuteSQL($query, $params)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    function GetProdutosNome($nome) {
        // monto a SQL
        $query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c";
        $query .= " ON p.produto_categoria = c.categorias_id";
        $query .= " WHERE produto_nome LIKE '%$nome%'";
        $query .= $this->PaginacaoLinks("produto_id", $this->prefix . "produtos WHERE produto_nome LIKE '%$nome%'");
        // passando parametros
        $params = array(':nome' => $nome);
        // executando a SQL                      
        $this->ExecuteSQL($query, $params);
        // trazendo a listagem 
        $this->GetLista();
    }
    
    function GetProdutosNomeCategoria($nome, $id_categoria) {
        // monto a SQL
        $query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c";
        $query .= " ON p.produto_categoria = c.categorias_id";
        $query .= " WHERE produto_nome LIKE '%$nome%' AND produto_categoria = " . (int) $id_categoria;
        $query .= $this->PaginacaoLinks("produto_id", $this->prefix . "produtos WHERE produto_nome LIKE '%$nome%'");
        // passando parametros
        $params = array(':nome' => $nome);
        $params = array(':id_categoria' => (int) $id_categoria);
        // executando a SQL                      
        $this->ExecuteSQL($query, $params);
        // trazendo a listagem 
        $this->GetLista();
    }

    //Metodos GET
    function getProduto_nome() {
        return $this->produto_nome;
    }

    function getProduto_categoria() {
        return $this->produto_categoria;
    }

    function getProduto_ativo() {
        return $this->produto_ativo;
    }

    function getProduto_modelo() {
        return $this->produto_modelo;
    }

    function getProduto_referencia() {
        return $this->produto_referencia;
    }

    function getProduto_valor() {
        return $this->produto_valor;
    }

    function getProduto_estoque() {
        return $this->produto_estoque;
    }

    function getProduto_peso() {
        return $this->produto_peso;
    }

    function getProduto_altura() {
        return $this->produto_altura;
    }

    function getProduto_largura() {
        return $this->produto_largura;
    }

    function getProduto_comprimento() {
        return $this->produto_comprimento;
    }

    function getProduto_imagem() {
        return $this->produto_imagem;
    }

    function getProduto_descricao() {
        return $this->produto_descricao;
    }

    function getProduto_slug() {
        return $this->produto_slug;
    }

    //Métodos SET
    function setProduto_nome($produto_nome) {
        $this->produto_nome = $produto_nome;
    }

    function setProduto_categoria($produto_categoria) {
        $this->produto_categoria = $produto_categoria;
    }

    function setProduto_ativo($produto_ativo) {
        $this->produto_ativo = $produto_ativo;
    }

    function setProduto_modelo($produto_modelo) {
        $this->produto_modelo = $produto_modelo;
    }

    function setProduto_referencia($produto_referencia) {
        $this->produto_referencia = $produto_referencia;
    }

    function setProduto_valor($produto_valor) {
        //1.335,99 => 1.33599
        // procura a virgula e troca por ponto
        $produto_valor = str_replace('.', '', $produto_valor);
        $produto_valor = str_replace(',', '.', $produto_valor);
        $this->produto_valor = $produto_valor;
        // echo $this->produto_valor;
    }

    function setProduto_estoque($produto_estoque) {
        $this->produto_estoque = $produto_estoque;
    }

    function setProduto_peso($produto_peso) {
        ///  1,600  => 1.600
        $this->produto_peso = str_replace(',', '.', $produto_peso);
    }

    function setProduto_altura($produto_altura) {
        $this->produto_altura = $produto_altura;
    }

    function setProduto_largura($produto_largura) {
        $this->produto_largura = $produto_largura;
    }

    function setProduto_comprimento($produto_comprimento) {
        $this->produto_comprimento = $produto_comprimento;
    }

    function setProduto_imagem($produto_imagem) {
        $this->produto_imagem = $produto_imagem;
    }

    function setProduto_descricao($produto_descricao) {
        $this->produto_descricao = $produto_descricao;
    }

    function setProduto_slug($produto_slug) {
        $this->produto_slug = Sistema::GetSlug($produto_slug);
    }

}
