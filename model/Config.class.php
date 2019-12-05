<?php

Class Config {

//Informções básicas do site.
//const SITE_URL = "http://localhost";
    const SITE_PASTA = "lojavirtual";
    const SITE_NOME = "Loja DIMTech";
    const SITE_EMAIL_ADMIN = "douglas.dimtech@gmail.com";
    const BD_LIMIT_POR_PAG = 6;
    const SITE_CEP = 37904567;
//Informações do Banco de dados localhost.
//const BD_HOST = "localhost";
//const BD_USER = "root";
//const BD_SENHA = "";
//const BD_BANCO = "loja_dimtech";
//const BD_PREFIX = "lv_";
//Informações do Banco de dados servidor. - HOSTGATOR
    const SITE_URL = "http://dimtech.com.br";
    const BD_HOST = "108.179.252.20";
    const BD_USER = "dimtec93_lojavir";
    const BD_SENHA = "030182dtb";
    const BD_BANCO = "dimtec93_lojavirtual";
    const BD_PREFIX = "lv_";
//Informações do Banco de dados servidor. UOL HOST
//const SITE_URL = "http://dimtech.com.br";
//const BD_HOST = "dimtec93lojavir.mysql.uhserver.com";
//const BD_USER = "dimtec93lojavir";
//const BD_SENHA = "030182.dtb";
//const BD_BANCO = "dimtec93lojavir";
//const BD_PREFIX = "lv_";
//Informações para PHP MAILLER
    const EMAIL_HOST = "smtp.gmail.com";
    const EMAIL_USER = "douglas.dimtech@gmail.com";
    const EMAIL_NOME = "Loja DIMTech";
    const EMAIL_SENHA = "030182dtb";
    const EMAIL_PORTA = "587";
    const EMAIL_SMTPAUTH = true;
    const EMAIL_SMTPSECURE = "tls";
    const EMAIL_COPIA = "douglas.dimtech@gmail.com";
    //CONSTANTES PARA O PAGSEGURO
    const PS_EMAIL = "douglasborgesegidio@gmail.com"; // email pagseguro
    const PS_TOKEN = "f15d8067-1162-42f8-bbae-67183045fd7a3ff657d940fca55ad9d90a61580f781c49f2-01cd-4581-bb5e-7f712e04860a"; // token produção
    const PS_TOKEN_SBX = "81E872EF6FE749AA929EF82B19B784A4";  // token do sandbox
    const PS_AMBIENTE = "sandbox"; // production   /  sandbox
//    const PS_AMBIENTE = "production"; // production   /  sandbox

}
