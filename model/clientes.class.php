<?php

class clientes extends conexao {

    private $clientes_nome,
            $clientes_sobrenome,
            $clientes_data_nasc,
            $clientes_rg,
            $clientes_cpf,
            $clientes_ddd,
            $clientes_fone,
            $clientes_celular,
            $clientes_endereco,
            $clientes_numero,
            $clientes_bairro,
            $clientes_cidade,
            $clientes_uf,
            $clientes_cep,
            $clientes_email,
            $clientes_data_cad,
            $clientes_hora_cad,
            $clientes_senha;

    function __construct() {
        parent::__construct();
    }

    function Preparar($clientes_nome, $clientes_sobrenome, $clientes_data_nasc, $clientes_rg,
            $clientes_cpf, $clientes_ddd, $clientes_fone, $clientes_celular, $clientes_endereco, $clientes_numero,
            $clientes_bairro, $clientes_cidade, $clientes_uf, $clientes_cep, $clientes_email, $clientes_data_cad,
            $clientes_hora_cad, $clientes_senha) {

        $this->setClientes_nome($clientes_nome);
        $this->setClientes_sobrenome($clientes_sobrenome);
        $this->setClientes_data_nasc($clientes_data_nasc);
        $this->setClientes_rg($clientes_rg);
        $this->setClientes_cpf($clientes_cpf);
        $this->setClientes_ddd($clientes_ddd);
        $this->setClientes_fone($clientes_fone);
        $this->setClientes_celular($clientes_celular);
        $this->setClientes_endereco($clientes_endereco);
        $this->setClientes_numero($clientes_numero);
        $this->setClientes_bairro($clientes_bairro);
        $this->setClientes_cidade($clientes_cidade);
        $this->setClientes_uf($clientes_uf);
        $this->setClientes_cep($clientes_cep);
        $this->setClientes_email($clientes_email);
        $this->setClientes_data_cad($clientes_data_cad);
        $this->setClientes_hora_cad($clientes_hora_cad);
        $this->setClientes_senha($clientes_senha);
    }

    function getClientes_nome() {
        return $this->clientes_nome;
    }

    function getClientes_sobrenome() {
        return $this->clientes_sobrenome;
    }

    function getClientes_data_nasc() {
        return $this->clientes_data_nasc;
    }

    function getClientes_rg() {
        return $this->clientes_rg;
    }

    function getClientes_cpf() {
        return $this->clientes_cpf;
    }

    function getClientes_ddd() {
        return $this->clientes_ddd;
    }

    function getClientes_fone() {
        return $this->clientes_fone;
    }

    function getClientes_celular() {
        return $this->clientes_celular;
    }

    function getClientes_endereco() {
        return $this->clientes_endereco;
    }

    function getClientes_numero() {
        return $this->clientes_numero;
    }

    function getClientes_bairro() {
        return $this->clientes_bairro;
    }

    function getClientes_cidade() {
        return $this->clientes_cidade;
    }

    function getClientes_uf() {
        return $this->clientes_uf;
    }

    function getClientes_cep() {
        return $this->clientes_cep;
    }

    function getClientes_email() {
        return $this->clientes_email;
    }

    function getClientes_data_cad() {
        return $this->clientes_data_cad;
    }

    function getClientes_hora_cad() {
        return $this->clientes_hora_cad;
    }

    function getClientes_senha() {
        return $this->clientes_senha;
    }

    function setClientes_nome($clientes_nome) {
        if (strlen($clientes_nome) < 3):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite seu nome com mais de três letras.';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->clientes_nome = $clientes_nome;
        endif;
    }

    function setClientes_sobrenome($clientes_sobrenome) {
        if (strlen($clientes_sobrenome) < 3):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite seu sobrenome com mais de três letras.';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->clientes_sobrenome = $clientes_sobrenome;
        endif;
    }

    function setClientes_data_nasc($clientes_data_nasc) {
        $this->clientes_data_nasc = $clientes_data_nasc;
    }

    function setClientes_rg($clientes_rg) {
        $this->clientes_rg = $clientes_rg;
    }

    function setClientes_cpf($clientes_cpf) {
        $this->clientes_cpf = $clientes_cpf;
    }

    function setClientes_ddd($clientes_ddd) {
        $ddd = filter_var($clientes_ddd, FILTER_SANITIZE_NUMBER_INT);
        if (strlen($ddd) != 2):
            echo '<div class="alert alert-danger " id="erro_mostrar"> DDD incorreto, digite apenas numeros.';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->clientes_ddd = $clientes_ddd;
        endif;
    }

    function setClientes_fone($clientes_fone) {
        $this->clientes_fone = $clientes_fone;
    }

    function setClientes_celular($clientes_celular) {
        $this->clientes_celular = $clientes_celular;
    }

    function setClientes_endereco($clientes_endereco) {
        $this->clientes_endereco = $clientes_endereco;
    }

    function setClientes_numero($clientes_numero) {

        $this->clientes_numero = $clientes_numero;
    }

    function setClientes_bairro($clientes_bairro) {
        $this->clientes_bairro = $clientes_bairro;
    }

    function setClientes_cidade($clientes_cidade) {
        $this->clientes_cidade = $clientes_cidade;
    }

    function setClientes_uf($clientes_uf) {
        $uf = filter_var($clientes_uf, FILTER_SANITIZE_STRING);
        if (strlen($uf) != 2): // 11111
            echo '<div class="alert alert-danger " id="erro_mostrar"> UF incorreto, digite a sigla do estado com duas letras maiusculas ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->clientes_uf = $clientes_uf;
        endif;
    }

    function setClientes_cep($clientes_cep) {
        $cep = filter_var($clientes_cep, FILTER_SANITIZE_NUMBER_INT);
        if (strlen($cep) != 8):
            echo '<div class="alert alert-danger " id="erro_mostrar"> CEP incorreto, digite apenas numeros. ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->clientes_cep = $clientes_cep;
        endif;
    }

    function setClientes_email($clientes_email) {
        if (!filter_var($clientes_email, FILTER_VALIDATE_EMAIL)):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Email incorreto ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        else:
            $this->clientes_email = $clientes_email;
        endif;
    }

    function setClientes_data_cad($clientes_data_cad) {
        $this->clientes_data_cad = $clientes_data_cad;
    }

    function setClientes_hora_cad($clientes_hora_cad) {
        $this->clientes_hora_cad = $clientes_hora_cad;
    }

    function setClientes_senha($clientes_senha) {
        $this->clientes_senha = md5($clientes_senha);
    }

    function Inserir() {
        if ($this->GetClienteCPF($this->getClientes_cpf()) > 0) {
            echo '<div class="alert alert-danger " id="erro_mostrar"> Este CPF já existe';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        }

        if ($this->GetClienteEmail($this->getClientes_email()) > 0) {
            echo '<div class="alert alert-danger " id="erro_mostrar"> Este Email já existe';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        }

        //INSERIR OS DADOS
        //query para inserir clientes
        $query = " INSERT INTO {$this->prefix}cliente (clientes_nome, clientes_sobrenome,clientes_data_nasc,clientes_rg,";
        $query .= " clientes_cpf, clientes_ddd,clientes_fone,clientes_celular ,clientes_endereco ,clientes_numero,clientes_bairro ,";
        $query .= " clientes_cidade ,clientes_uf ,clientes_cep ,clientes_email ,clientes_data_cad, clientes_hora_cad, clientes_pass)";
        $query .= " VALUES ";
        $query .= " (:clientes_nome, :clientes_sobrenome,:clientes_data_nasc,:clientes_rg,";
        $query .= " :clientes_cpf, :clientes_ddd,:clientes_fone,:clientes_celular ,:clientes_endereco ,:clientes_numero,:clientes_bairro ,";
        $query .= " :clientes_cidade ,:clientes_uf ,:clientes_cep ,:clientes_email ,:clientes_data_cad, :clientes_hora_cad, :clientes_senha)";

        $params = array(
            ':clientes_nome' => $this->getClientes_nome(),
            ':clientes_sobrenome' => $this->getClientes_sobrenome(),
            ':clientes_data_nasc' => $this->getClientes_data_nasc(),
            ':clientes_rg' => $this->getClientes_rg(),
            ':clientes_cpf' => $this->getClientes_cpf(),
            ':clientes_ddd' => $this->getClientes_ddd(),
            ':clientes_fone' => $this->getClientes_fone(),
            ':clientes_celular' => $this->getClientes_celular(),
            ':clientes_endereco' => $this->getClientes_endereco(),
            ':clientes_numero' => $this->getClientes_numero(),
            ':clientes_bairro' => $this->getClientes_bairro(),
            ':clientes_cidade' => $this->getClientes_cidade(),
            ':clientes_uf' => $this->getClientes_uf(),
            ':clientes_cep' => $this->getClientes_cep(),
            ':clientes_email' => $this->getClientes_email(),
            ':clientes_data_cad' => $this->getClientes_data_cad(),
            ':clientes_hora_cad' => $this->getClientes_hora_cad(),
            ':clientes_senha' => $this->getClientes_senha()
        );
        $this->ExecuteSQL($query, $params);
    }

    //MÉTODO EDITAR
    function Editar($id) {
        // verifico se ja tem este CPF no banco
        if ($this->GetClienteCPF($this->getClientes_cpf()) > 0 && $this->getClientes_cpf() != $_SESSION['CLI']['clientes_cpf']):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Este CPF já esta cadastrado ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
        // verifica se o email já esta cadastrado 
        if ($this->GetClienteEmail($this->getClientes_email()) > 0 && $this->getClientes_email() != $_SESSION['CLI']['clientes_email']):
            echo '<BR>';
            echo '<div class="alert alert-danger " id="erro_mostrar"> Este Email já esta cadastrado ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
        // caso passou na verificação grava no banco
        $query = " UPDATE {$this->prefix}clientes SET clientes_nome=:clientes_nome, clientes_sobrenome=:clientes_sobrenome,clientes_data_nasc=:clientes_data_nasc,clientes_rg=:clientes_rg,";
        $query .= " clientes_cpf=:clientes_cpf, clientes_ddd=:clientes_ddd,clientes_fone=:clientes_fone,clientes_celular=:clientes_celular ,clientes_endereco=:clientes_endereco ,clientes_numero=:clientes_numero,clientes_bairro=:clientes_bairro ,";
        $query .= " clientes_cidade=:clientes_cidade ,clientes_uf=:clientes_uf ,clientes_cep=:clientes_cep ,clientes_email=:clientes_email ,clientes_data_cad=:clientes_data_cad, clientes_hora_cad=:clientes_hora_cad, clientes_pass=:clientes_senha ";
        $query .= " WHERE  clientes_id = :clientes_id";
        $params = array(
            ':clientes_nome' => $this->getClientes_nome(),
            ':clientes_sobrenome' => $this->getClientes_sobrenome(),
            ':clientes_data_nasc' => $this->getClientes_data_nasc(),
            ':clientes_rg' => $this->getClientes_rg(),
            ':clientes_cpf' => $this->getClientes_cpf(),
            ':clientes_ddd' => $this->getClientes_ddd(),
            ':clientes_fone' => $this->getClientes_fone(),
            ':clientes_celular' => $this->getClientes_celular(),
            ':clientes_endereco' => $this->getClientes_endereco(),
            ':clientes_numero' => $this->getClientes_numero(),
            ':clientes_bairro' => $this->getClientes_bairro(),
            ':clientes_cidade' => $this->getClientes_cidade(),
            ':clientes_uf' => $this->getClientes_uf(),
            ':clientes_cep' => $this->getClientes_cep(),
            ':clientes_email' => $this->getClientes_email(),
            ':clientes_data_cad' => $this->getClientes_data_cad(),
            ':clientes_hora_cad' => $this->getClientes_hora_cad(),
            ':clientes_senha' => $this->getClientes_senha(),
            ':clientes_id' => (int) $id
        );
        if ($this->ExecuteSQL($query, $params)):
            return true;
        else:
            return false;
        endif;
    }

    //MÉTODO EDITAR
    function EditarClientesADMIN($id) {
        // verifico se ja tem este CPF no banco
        if ($this->GetClienteCPF($this->getClientes_cpf()) > 0 && $this->getClientes_cpf() != $_REQUEST['clientes_cpf']):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Este CPF já esta cadastrado ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
        // verifica se o email já esta cadastrado 
        if ($this->GetClienteEmail($this->getClientes_email()) > 0 && $this->getClientes_email() != $_REQUEST['clientes_email']):
            echo '<BR>';
            echo '<div class="alert alert-danger " id="erro_mostrar"> Este Email já esta cadastrado ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
        // caso passou na verificação grava no banco
        $query = " UPDATE {$this->prefix}clientes SET clientes_nome=:clientes_nome, clientes_sobrenome=:clientes_sobrenome,clientes_data_nasc=:clientes_data_nasc,clientes_rg=:clientes_rg,";
        $query .= " clientes_cpf=:clientes_cpf, clientes_ddd=:clientes_ddd,clientes_fone=:clientes_fone,clientes_celular=:clientes_celular ,clientes_endereco=:clientes_endereco ,clientes_numero=:clientes_numero,clientes_bairro=:clientes_bairro ,";
        $query .= " clientes_cidade=:clientes_cidade ,clientes_uf=:clientes_uf ,clientes_cep=:clientes_cep ,clientes_email=:clientes_email ,clientes_data_cad=:clientes_data_cad, clientes_hora_cad=:clientes_hora_cad, clientes_pass=:clientes_senha ";
        $query .= " WHERE  clientes_id = :clientes_id";
        $params = array(
            ':clientes_nome' => $this->getClientes_nome(),
            ':clientes_sobrenome' => $this->getClientes_sobrenome(),
            ':clientes_data_nasc' => $this->getClientes_data_nasc(),
            ':clientes_rg' => $this->getClientes_rg(),
            ':clientes_cpf' => $this->getClientes_cpf(),
            ':clientes_ddd' => $this->getClientes_ddd(),
            ':clientes_fone' => $this->getClientes_fone(),
            ':clientes_celular' => $this->getClientes_celular(),
            ':clientes_endereco' => $this->getClientes_endereco(),
            ':clientes_numero' => $this->getClientes_numero(),
            ':clientes_bairro' => $this->getClientes_bairro(),
            ':clientes_cidade' => $this->getClientes_cidade(),
            ':clientes_uf' => $this->getClientes_uf(),
            ':clientes_cep' => $this->getClientes_cep(),
            ':clientes_email' => $this->getClientes_email(),
            ':clientes_data_cad' => $this->getClientes_data_cad(),
            ':clientes_hora_cad' => $this->getClientes_hora_cad(),
            ':clientes_senha' => $this->getClientes_senha(),
            ':clientes_id' => (int) $id
        );
        if ($this->ExecuteSQL($query, $params)):
            return true;
        else:
            return false;
        endif;
    }

    //BUSCAR SE O CPF DO CLIENTE JÁ EXISTE
    function GetClienteCPF($cpf) {
        $query = "SELECT * FROM {$this->prefix}clientes ";
        $query .= " WHERE clientes_cpf = :cpf ";
        $params = array(':cpf' => $cpf);
        $this->ExecuteSQL($query, $params);
        return $this->TotalDados();
    }

    function GetClienteEmail($email) {
        $query = "SELECT * FROM {$this->prefix}clientes ";
        $query .= " WHERE clientes_email = :email ";
        $params = array(':email' => $email);
        $this->ExecuteSQL($query, $params);
        return $this->TotalDados();
    }

    function SenhaUpdate($senha, $email) {
        $query = "UPDATE {$this->prefix}clientes SET clientes_pass = :senha";
        $query .= " WHERE clientes_email = :email ";
        $this->setClientes_senha($senha);
        $this->setClientes_email($email);
        $params = array(':senha' => $this->getClientes_senha(), ':email' => $this->getClientes_email());
        $this->ExecuteSQL($query, $params);
    }

    //CLASSE DE CLIENTS - FUNÇÕES PARA BUSCAR
    function GetClientes() {
        $query = " SELECT * FROM {$this->prefix}clientes ";
        $this->ExecuteSQL($query);
        $this->GetLista();
    }

    //@param INT $id id do cliente 
    function GetClientesID($id) {
        // monto a SQL
        $query = " SELECT * FROM {$this->prefix}clientes ";
        $query .= " WHERE clientes_id = :id ";
        // passo parametros
        $params = array(':id' => (int) $id);
        //executo a SQL
        $this->ExecuteSQL($query, $params);
        // chamo a listagem 
        $this->GetLista();
    }

    /**
     * fazendo a listagem dos dados retornados 
     */
    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'clientes_id' => $lista['clientes_id'],
                'clientes_nome' => $lista['clientes_nome'],
                'clientes_sobrenome' => $lista['clientes_sobrenome'],
                'clientes_endereco' => $lista['clientes_endereco'],
                'clientes_numero' => $lista['clientes_numero'],
                'clientes_bairro' => $lista['clientes_bairro'],
                'clientes_cidade' => $lista['clientes_cidade'],
                'clientes_uf' => $lista['clientes_uf'],
                'clientes_cpf' => $lista['clientes_cpf'],
                'clientes_cep' => $lista['clientes_cep'],
                'clientes_rg' => $lista['clientes_rg'],
                'clientes_ddd' => $lista['clientes_ddd'],
                'clientes_fone' => $lista['clientes_fone'],
                'clientes_email' => $lista['clientes_email'],
                'clientes_celular' => $lista['clientes_celular'],
                'clientes_pass' => $lista['clientes_pass'],
                'clientes_data_nasc' => $lista['clientes_data_nasc'],
                'clientes_hora_cad' => $lista['clientes_hora_cad'],
                'clientes_data_cad' => Sistema::Fdata($lista['clientes_data_cad']),
            );
            $i++;
        endwhile;
    }

    //FUNCAO EDITAR CLIENTES ADM
    function EditarADM($id) {
        // verifico se ja tem este CPF no banco
        if ($this->GetClienteCPF($this->getClientes_cpf()) > 0 && $this->getClientes_cpf() != $_REQUEST['clientes_cpf']):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Este CPF já esta cadastrado ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
        // verifica se o email já esta cadstrado 
        if ($this->GetClienteEmail($this->getClientes_email()) > 0 && $this->getClientes_email() != $_REQUEST['clientes_email']):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Este Email já esta cadastrado ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
        // caso passou na verificação grava no banco
        $query = " UPDATE {$this->prefix}clientes SET clientes_nome=:clientes_nome, clientes_sobrenome=:clientes_sobrenome,clientes_data_nasc=:clientes_data_nasc,clientes_rg=:clientes_rg,";
        $query .= " clientes_cpf=:clientes_cpf, clientes_ddd=:clientes_ddd,clientes_fone=:clientes_fone,clientes_celular=:clientes_celular ,clientes_endereco=:clientes_endereco ,clientes_numero=:clientes_numero,clientes_bairro=:clientes_bairro ,";
        $query .= " clientes_cidade=:clientes_cidade ,clientes_uf=:clientes_uf ,clientes_cep=:clientes_cep ,clientes_email=:clientes_email  ";
        $query .= " WHERE  clientes_id = :clientes_id";
        $params = array(
            ':clientes_nome' => $this->getClientes_nome(),
            ':clientes_sobrenome' => $this->getClientes_sobrenome(),
            ':clientes_data_nasc' => $this->getClientes_data_nasc(),
            ':clientes_rg' => $this->getClientes_rg(),
            ':clientes_cpf' => $this->getClientes_cpf(),
            ':clientes_ddd' => $this->getClientes_ddd(),
            ':clientes_fone' => $this->getClientes_fone(),
            ':clientes_celular' => $this->getClientes_celular(),
            ':clientes_endereco' => $this->getClientes_endereco(),
            ':clientes_numero' => $this->getClientes_numero(),
            ':clientes_bairro' => $this->getClientes_bairro(),
            ':clientes_cidade' => $this->getClientes_cidade(),
            ':clientes_uf' => $this->getClientes_uf(),
            ':clientes_cep' => $this->getClientes_cep(),
            ':clientes_email' => $this->getClientes_email(),
            ':clientes_id' => (int) $id
        );
        //  echo $query;
        if ($this->ExecuteSQL($query, $params)):
            return true;
        else:
            return false;
        endif;
    }

}
