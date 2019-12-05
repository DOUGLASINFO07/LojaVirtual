<?php

class Usuario extends conexao{
    
    private $user, $senha, $email;
            
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param string $email do USER
     * @return boolean caso exista 
     */
    function GetUsuario_admin_email($email){
        $this->setEmail($email);
        $query = " SELECT * FROM {$this->prefix}usuarios_admin WHERE usuario_admin_email = :email ";
        $params = array(':email'=>  $this->getEmail());
        $this->ExecuteSQL($query, $params);
        return $this->TotalDados();
    }
    
     //alterar a senha  do USER
    function AlterarSenha($senha,$email){
        // setando email e senha
        $this->setSenha($senha);
        $this->setEmail($email);
        // montando a SQL
        $query = "UPDATE {$this->prefix}usuarios_admin SET usuario_admin_senha = :senha";
        $query.= " WHERE usuario_admin_email = :email";
        // passando parametros
        $params = array(':senha' => $this->getSenha(), ':email' => $this->getEmail());
        // executando a SQL
        if ($this->ExecuteSQL($query, $params)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    //SÃO OS GETTERS E SETTERS 
    function getUsuario_admin_() {
        return $this->user;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }

    function setUsuario_admin_($user) {
        $this->user = $user;
    }

    function setSenha($senha) {
        $this->senha = md5($senha);
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
}

