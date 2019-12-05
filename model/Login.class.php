<?php

class Login extends conexao {

    private $user, $senha;

    function __construct() {
        parent::__construct();
    }

    function GetLogin($user, $senha) {
        $this->setUser($user);
        $this->setSenha($senha);

        $query = "SELECT * FROM {$this->prefix}clientes WHERE"
                . " clientes_email = :email AND clientes_pass = :senha";

        $params = array(
            ':email' => $this->getUser(),
            ':senha' => $this->getSenha(),
        );

        $this->ExecuteSQL($query, $params);

        if ($this->TotalDados() > 0) {
            $lista = $this->ListarDados();

            $_SESSION['CLI']['clientes_id'] = $lista['clientes_id'];
            $_SESSION['CLI']['clientes_nome'] = $lista['clientes_nome'];
            $_SESSION['CLI']['clientes_sobrenome'] = $lista['clientes_sobrenome'];
            $_SESSION['CLI']['clientes_endereco'] = $lista['clientes_endereco'];
            $_SESSION['CLI']['clientes_numero'] = $lista['clientes_numero'];
            $_SESSION['CLI']['clientes_bairro'] = $lista['clientes_bairro'];
            $_SESSION['CLI']['clientes_cidade'] = $lista['clientes_cidade'];
            $_SESSION['CLI']['clientes_uf'] = $lista['clientes_uf'];
            $_SESSION['CLI']['clientes_cpf'] = $lista['clientes_cpf'];
            $_SESSION['CLI']['clientes_cep'] = $lista['clientes_cep'];
            $_SESSION['CLI']['clientes_rg'] = $lista['clientes_rg'];
            $_SESSION['CLI']['clientes_ddd'] = $lista['clientes_ddd'];
            $_SESSION['CLI']['clientes_fone'] = $lista['clientes_fone'];
            $_SESSION['CLI']['clientes_email'] = $lista['clientes_email'];
            $_SESSION['CLI']['clientes_celular'] = $lista['clientes_celular'];
            $_SESSION['CLI']['clientes_data_nasc'] = $lista['clientes_data_nasc'];
            $_SESSION['CLI']['clientes_hora_cad'] = $lista['clientes_hora_cad'];
            $_SESSION['CLI']['clientes_data_cad'] = $lista['clientes_data_cad'];
            $_SESSION['CLI']['clientes_pass'] = $lista['clientes_pass'];

            //Atualiza a pagina.
            Rotas::Redirecionar(0, Rotas::pag_MinhaConta());
        } else {
            echo '<script> alert("Dados Incorretos"); </script>';
        }
    }

    static function Logado() {
        if (isset($_SESSION['CLI']['clientes_email']) && isset($_SESSION['CLI']['clientes_id'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    static function LogadoADMIN() {
        if (isset($_SESSION['ADM']['usuario_admin_nome']) && isset($_SESSION['ADM']['usuario_admin_id'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    static function Logoff() {
        unset($_SESSION['CLI']);
        echo '<h4 class="alert alert-success"> Saindo... </h4>';
        Rotas::Redirecionar(1, Rotas::get_SiteHome());
    }

    static function LogoffADMIN() {
        unset($_SESSION['ADM']);
         echo '<h4 class="alert alert-success"> Saindo... </h4>';
        Rotas::Redirecionar(1, Rotas::get_SiteADMIN());
//        Rotas::Redirecionar(0, 'admin/login.php'());
    }

    static function AcessoNegado() {
        echo '<div class="alert alert-danger"><a href="' . Rotas::pag_ClienteLogin() . '" class="btn btn-danger">Login </a> Acesso Negado, faça Login</div>';
    }

    static function MenuCliente() {
        // verifo se não esta logado 
        if (!self::Logado()):
            self::AcessoNegado();
            Rotas::Redirecionar(1, Rotas::pag_ClienteLogin());
            // caso nao redirecione  saiu  do bloco
            exit();
        // caso esteja mostra a tela minha conta 
        else:
            $smarty = new Template();
            $smarty->assign('PAG_CONTA', Rotas::pag_ClienteConta());
            $smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
            $smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
            $smarty->assign('PAG_CLIENTE_PEDIDOS', Rotas::pag_CLientePedidos());
            $smarty->assign('PAG_CLIENTE_DADOS', Rotas::pag_CLienteDados());
            $smarty->assign('PAG_CLIENTE_SENHA', Rotas::pag_CLienteSenha());
            $smarty->assign('USER', $_SESSION['CLI']['clientes_nome']);
            $smarty->display('view/menu_cliente.tpl');
        endif;
    }

    //FUNCAO PARA LOGIN DO ADM
    function GetLoginADMIN($user, $senha) {
        $this->setUser($user);
        $this->setSenha($senha);
        $query = "SELECT * FROM {$this->prefix}usuarios_admin WHERE usuario_admin_email = :email AND usuario_admin_senha = :senha";
        $params = array(':email' => $this->getUser(),
            ':senha' => $this->getSenha());
        $this->ExecuteSQL($query, $params);
        // caso o login seja efetivado com exito 
        if ($this->TotalDados() > 0):
            $lista = $this->ListarDados();
            $_SESSION['ADM']['usuario_admin_id'] = $lista['usuario_admin_id'];
            $_SESSION['ADM']['usuario_admin_nome'] = $lista['usuario_admin_nome'];
            $_SESSION['ADM']['usuario_admin_email'] = $lista['usuario_admin_email'];
            $_SESSION['ADM']['usuario_admin_senha'] = $lista['usuario_admin_senha'];
            $_SESSION['ADM']['usuario_admin_data'] = Sistema::DataAtualBR();
            $_SESSION['ADM']['usuario_admin_hora'] = Sistema::HoraAtual();
            return TRUE;
        // caso o login seja incorreto 
        else:
            echo '<h4 class="alert alert-danger"> O login incorreto </h4>';
            //  Rotas::Redirecionar(1,  Rotas::pag_ClienteLogin() );
            return FALSE;
        endif;
    }

    function getUser() {
        return $this->user;
    }

    function getSenha() {
        return $this->senha;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setSenha($senha) {
        $this->senha = md5($senha);
    }

}
