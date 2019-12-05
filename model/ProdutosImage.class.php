<?php

Class ProdutosImage extends Conexao {

    function GetImagesPRO($pro) {
        $query = "SELECT * FROM {$this->prefix}imagens WHERE imagem_produto_id = :pro";
//         $query .= " AND produto_id = :id";
        $params = array(':pro' => (int) $pro);
        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }

    function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'imagens_id' => $lista['imagens_id'],
                'imagem_nome' => Rotas::ImageLink($lista['imagem_nome'], 150, 150),
                'imagem_produto_id' => $lista['imagem_produto_id'],
                'imagem_link' => Rotas::ImageLink($lista['imagem_nome'], 500, 500),
                'imagem_arquivo' => $lista['imagem_nome']
            );
            $i++;
        endwhile;
    }

    public function Insert($img, $produto) {
        $query = "INSERT INTO {$this->prefix}imagens (imagem_nome,imagem_produto_id)";
        $query .= " VALUES (:imagem_nome,:imagem_produto_id) ";
        $params = array(':imagem_nome' => $img, ':imagem_produto_id' => (int) $produto);
        $this->ExecuteSQL($query, $params);
    }

    public function Deletar($imagem_nome) {
        $query = " DELETE FROM {$this->prefix}imagens ";
        $query .= " WHERE imagem_nome = :imagem_nome ";
        $params = array(':imagem_nome' => $imagem_nome);
        $this->ExecuteSQL($query, $params);
    }

}
