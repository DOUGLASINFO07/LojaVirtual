<?php

class PagamentoPS extends conexao {

    public $tipo_frete;
    private
    /*     * ** @var string: armazena objeto da transação */
            $transaction,
            /*             * ** @var string:forma de pagamento */
            $forma_pag,
            /*             * ** @var string: trata o status do pagamento */
            $status,
            /*             * ** @var string URL do wb service para iniciar um checkout */
            $psWS,
            /*             * **$var string  token do PS** */
            $token,
            /*             * ** para armazenar retorno temporário **** */
            $xml;
    public
    /*     * ** @var string URL para fechar o pedido */
            $psURL,
            /*             * ** @var string URL do javascript do lighbox do pagseguro */
            $psURL_Script,
            /*             * ** @var string: URL das notificações  */
            $psURL_Notificacao,
            /*             * ** @var string: retorno do COD checkout  */
            $psCod,
            /*             * *array com davdos da transação *** */
            $info = array();

    /**
     * Chama o contrutor pai e seta cada URL para o ambiente escolhido 
     */
    function __construct() {
        parent::__construct();

        /** verifico se produção  ou sandbox * */
        switch (Config::PS_AMBIENTE):
// ambiente de testes
            case 'sandbox':
                $this->psWS = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';
                $this->psURL = 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html';
                $this->psURL_Script = 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js';
                $this->psURL_Notificacao = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/transaction/';
                $this->token = Config::PS_TOKEN_SBX;
                break;
// ambiente de produção real
            case 'production':
                $this->psWS = 'https://ws.pagseguro.uol.com.br/v2/checkout';
                $this->psURL = 'https://pagseguro.uol.com.br/v2/checkout/payment.html';
                $this->psURL_Script = 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js';
                $this->psURL_Notificacao = 'https://ws.pagseguro.uol.com.br/v3/transactions/';
                $this->token = Config::PS_TOKEN;
                break;
        endswitch;
    }

    /**     * requisicao de pagamento  * @param array $cliente  * @param array $pedido  * @param array $produtos   */
    public function Pagamento($cliente = array(), $pedido = array(), $produtos = array()) {
        $dados['email'] = Config::PS_EMAIL;
        $dados['token'] = $this->token;
        $dados['currency'] = 'BRL';
        $dados['reference'] = $pedido['pedidos_ref']; // referencia pedido 
        $dados['redirectURL'] = Rotas::pag_PedidoRetorno();
        $dados['notificationURL'] = Rotas::pag_PedidoRetorno();
        $dados['senderName'] = $cliente['clientes_nome'] . ' ' . $cliente['clientes_sobrenome'];
        $dados['senderAreaCode'] = $cliente['clientes_ddd'];
        $dados['senderPhone'] = $cliente['clientes_celular'];
        $dados['senderEmail'] = $cliente['clientes_email'];
        $dados['senderCPF'] = $cliente['clientes_cpf'];
        $dados['shippingAddressStreet'] = $cliente['clientes_endereco'];
        $dados['shippingAddressNumber'] = $cliente['clientes_numero'];
//$dados['shippingAddressComplement'] = '';
        $dados['shippingAddressDistrict'] = $cliente['clientes_bairro'];
        $dados['shippingAddressPostalCode'] = $cliente['clientes_cep'];
        $dados['shippingAddressCity'] = $cliente['clientes_cidade'];
        $dados['shippingAddressState'] = strtoupper($cliente['clientes_uf']);
        $dados['encoding'] = ['utf-8'];
        if ($pedido['tipo_frete'] == 'SEDEX') {
            $tipo_frete = 2;
        } else {
            $tipo_frete = 1;
        }
        $dados['shippingType'] = $tipo_frete; // sem especificar
        $dados['shippingAddressCountry'] = 'BRA';
        $dados['shippingCost'] = number_format($pedido['frete'], 2, '.', ''); // valor do frete
        /* varrendo o array de produtos  para montar os itens */
        $i = 1;
        foreach ($produtos as $item):
            $dados['itemId' . $i] = $item['produto_id'];
            $dados['itemDescription' . $i] = $item['produto_nome'];
            $dados['itemAmount' . $i] = number_format($item['produto_valor_us'], 2, '.', '');
            $dados['itemQuantity' . $i] = $item['produto_quantidade'];
            $i++;
        endforeach;
//        $dados['itemWeight1'] = '1000';
// Monta a URL para enviar ao WS
        $dados = http_build_query($dados);
//   echo'<pre>' . $dados .'</pre>' ;
        $curl = curl_init($this->psWS);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
        $retorno = curl_exec($curl);
// verifico se foi autorizado, erros de TOKEN, AMBIENTE ou EMAIL podem dar erros aqui        
        if ($retorno == 'Unauthorized'):
            var_dump($retorno);
// exit(); 
        else:
            curl_close($curl);
// pego o retorno do WS e jogo em uma var  chamada XML
            $xml = simplexml_load_string($retorno);
// CASO ERROR RETORNAR ALGO 
            if (count($xml->error) > 0):
                var_dump($xml->error->message);
// verificando alguns erros e tratando 
                switch ($xml->error->code):
                    case 11164:
                        $msg = 'CPF do cliente está Incorreto';
                        break;
                    case 11010:
                        $msg = 'Email do cliente está Incorreto';
                        break;
                endswitch;
                Sistema::VoltarPagina();
                echo $xml->error->message;
                exit();
            else:
// CASO NÃO DER ERRO 
//  var_dump($xml);
                $this->psCod = $xml->code;
            endif; // fim do IF caso teve erros ou não 
        endif;  // fim do IF autorizado ou não 
    }

    /**     * requisicao de pagamento  * @param array $cliente  * @param array $pedido  * @param array $produtos   */
    public function PagamentoITENS($cliente = array(), $pedido = array(), $produtos = array(), $frete, $tipo_frete_parametro) {
        
        $dados['email'] = Config::PS_EMAIL;
        $dados['token'] = $this->token;
        $dados['currency'] = 'BRL';
        $dados['reference'] = $pedido['pedidos_ref']; // referencia pedido 
        $dados['redirectURL'] = Rotas::pag_PedidoRetorno();
        $dados['notificationURL'] = Rotas::pag_PedidoRetorno();
        $dados['senderName'] = $cliente['clientes_nome'] . ' ' . $cliente['clientes_sobrenome'];
        $dados['senderAreaCode'] = $cliente['clientes_ddd'];
        $dados['senderPhone'] = $cliente['clientes_celular'];
        $dados['senderEmail'] = $cliente['clientes_email'];
        $dados['senderCPF'] = $cliente['clientes_cpf'];
        $dados['shippingAddressStreet'] = $cliente['clientes_endereco'];
        $dados['shippingAddressNumber'] = $cliente['clientes_numero'];
//$dados['shippingAddressComplement'] = '';
        $dados['shippingAddressDistrict'] = $cliente['clientes_bairro'];
        $dados['shippingAddressPostalCode'] = $cliente['clientes_cep'];
        $dados['shippingAddressCity'] = $cliente['clientes_cidade'];
        $dados['shippingAddressState'] = strtoupper($cliente['clientes_uf']);
        $dados['encoding'] = ['utf-8'];
        if ($tipo_frete_parametro == 'SEDEX') {
            $tipo_frete = 2;
        } else {
            $tipo_frete = 1;
        }
        $dados['shippingType'] = $tipo_frete; // sem especificar
        $dados['shippingAddressCountry'] = 'BRA';
        $dados['shippingCost'] = number_format($frete, 2, '.', ''); // valor do frete
        /* varrendo o array de produtos  para montar os itens */
        $i = 1;
        foreach ($produtos as $item):
            $dados['itemId' . $i] = $item['item_id'];
            $dados['itemDescription' . $i] = $item['item_nome'];
            $dados['itemAmount' . $i] = number_format($item['item_valor_us'], 2, '.', '');
            $dados['itemQuantity' . $i] = $item['item_qtd'];
            $i++;
        endforeach;
//     echo '<pre>';
//     var_dump($dados);
//    echo '</pre>';
//        $dados['itemWeight1'] = '1000';
// Monta a URL para enviar ao WS
        $dados = http_build_query($dados);
//   echo'<pre>' . $this->psWS. $dados .'</pre>' ;
        $curl = curl_init($this->psWS);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
        $retorno = curl_exec($curl);
// verifico se foi autorizado, erros de TOKEN, AMBIENTE ou EMAIL podem dar erros aqui        
        if ($retorno == 'Unauthorized'):
            var_dump($retorno);
//  exit(); 
        else:
            curl_close($curl);
// pego o retorno do WS e jogo em uma var  chamada XML
            $xml = simplexml_load_string($retorno);
// CASO ERROR RETORNAR ALGO 
            if (count($xml->error) > 0):
                var_dump($xml->error->message);
// verificando alguns erros e tratando 
                switch ($xml->error->code):
                    case 11164:
                        $msg = 'CPF do cliente está Incorreto';
                        break;
                    case 11010:
                        $msg = 'Email do cliente está Incorreto';
                        break;
                endswitch;
                Sistema::VoltarPagina();
                echo $xml->error->message;
                exit();
            else:
// CASO NÃO DER ERRO 
//   var_dump($xml);
                $this->psCod = $xml->code;
            endif; // fim do IF caso teve erros ou não 
        endif;  // fim do IF autorizado ou não 
    }

    /*     * *   PARA BUSCAR transação por cod referencia * */

    public function BuscarTransacaoREF($codigo_transacao, $referencia) {
        // credenciais pagseguro pegando da classe Config
        $email = Config::PS_EMAIL;
        $token = $this->token;


        $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/' . $codigo_transacao . '?email=' . $email . '&token=' . $token;
//        $url = 'https://ws.pagseguro.uol.com.br/v2/transactions/' . $codigo_transacao . '?email=' . $email . '&token=' . $token;

//'E342F182-94AD-4429-86DE-47FA41254FD3;
        function curlExec($url, $post = NULL, array $header = array()) {

//Inicia o cURL
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
//Pede o que retorne o resultado como string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Envia cabeçalhos (Caso tenha)
            if (count($header) > 0) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            }

//Envia post (Caso tenha)
            if ($post !== null) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            }

//Ignora certificado SSL
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            

//Manda executar a requisição
            $data = curl_exec($ch);

//Fecha a conexão para economizar recursos do servidor
            curl_close($ch);

//Retorna o resultado da requisição

            return $data;
        }

        $transaction = curlExec($url);

        if ($transaction == 'Unauthorized') {
//Insira seu código avisando que o sistema está com problemas
//sugiro enviar um e-mail avisando para alguém fazer a manutenção
            echo 'You shall not pass';
            exit; //Mantenha essa linha para evitar que o código prossiga
        }

        $transaction = simplexml_load_string($transaction);

        if (count($transaction->error) > 0) {
//Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
            var_dump('ERRO');
        }

        foreach (array($transaction) as $transaction) {


            //--------tratando o status do pagamento que vem numérico
            switch ($transaction->status):
                case 1 : $this->status = "Aguardando pagamento";
                    break;
                case 2 : $this->status = "Em analise";
                    break;
                case 3 : $this->status = "Paga";
                    break;
                case 4 : $this->status = "Disponível";
                    break;
                case 5 : $this->status = "Em disputa";
                    break;
                case 6 : $this->status = "Devolvida";
                    break;
                case 7 : $this->status = "Cancelada";
                    break;
            endswitch;
            //----tratando o tipo de pagamento que vem numérico
            switch ($transaction->paymentMethod->type):
                case 1 : $this->forma_pag = "Cartao";
                    break;
                case 2 : $this->forma_pag = "Boleto";
                    break;
                case 3 : $this->forma_pag = "TEF";
                    break;
                case 4 : $this->forma_pag = "Saldo PagSeguro";
                    break;
                case 5 : $this->forma_pag = "Oi Paggo";
                    break;
            endswitch;
            //passo algumas variaveis que eu precisar 
            $pago = $this->status;
//            $codigo = '$transaction->code';
            $codigo = $transaction->code;
            $reference = $referencia;
            $forma_pag = $this->forma_pag;
            // passo balores  para meu array INFO
            $this->info = array(
                'pago' => $pago,
                'codigo' => $codigo,
                'referencia' => $reference,
                'forma_pag' => $forma_pag
            );
            // fim do foreach que varre os dados já que pode retornar mais de 1 pedido   
        }
        ////        endforeach;
        // atualiza pedido status
        $this->PedidoUpdate($codigo, $pago, $forma_pag, $reference);
        // envia email 
        $this->EnviarEmail();
//        endif;
    }

    /**
     * Processa o retorno de informações do pagseguro 
     */
    public function Nofificacao() {
        /*
          VERIFICA SE EXISTE  UMA NOTIFICAÇÃO
         */
        /*
          VERIFICA SE EXISTE  UMA NOTIFICAÇÃO
         */
        if (isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'):
// credenciais pagseguro pegando da classe Config
            $email = Config::PS_EMAIL;
            $token = $this->token;
// chamo a URL da notificação      
            $url = $this->psURL_Notificacao . 'notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $retorno = curl_exec($curl);
            curl_close($curl);
// verifica se não foi autorizado a requisição e para tudo.  
            if ($retorno == 'Unauthorized'):
// caso não for autorizado posso mostrar algo aqui.          
            else:
// pegando os dados retornados. 
                $this->xml = simplexml_load_string($retorno);
//--------tratando o status do pagamento.
                switch ($this->xml->status):
                    case 1 : $this->status = "Processando";
                        break;
                    case 2 : $this->status = "Analise";
                        break;
                    case 3 : $this->status = "Paga";
                        break;
                    case 4 : $this->status = "Disponivel";
                        break;
                    case 7 : $this->status = "Cancelado";
                        break;
                    case 6 : $this->status = "Devolvida";
                        break;
                endswitch;
//----tratando o tipo de pagamento.
                switch ($this->xml->paymentMethod->type):
                    case 1 : $this->forma_pag = "Cartao";
                        break;
                    case 2 : $this->forma_pag = "Boleto";
                        break;
                    case 3 : $this->forma_pag = "TEF";
                        break;
                    case 4 : $this->forma_pag = "Saldo PagSeguro";
                        break;
                    case 5 : $this->forma_pag = "Oi Paggo";
                        break;

                endswitch;

//passo algumas variaveis que eu precisar. 
                $pago = $this->status;
                $codigo = $this->xml->code;
                $referencia = $this->xml->reference;
                $forma_pag = $this->forma_pag;
// atualiza pedido status.
                $this->PedidoUpdate($codigo, $pago, $forma_pag, $referencia);
// envia email. 
                $this->EnviarEmail();

            endif; // fim do if Unauthorized.
// fim do ISSET POST notificationType.
        endif;
    }

    /**
     * grava atualização de status na tabela pedidos
     * @param string $codigo
     * @param string $pago
     * @param string $forma_pag
     * @param string $referencia
     */
    private function PedidoUpdate($codigo, $pago, $forma_pag, $reference) {

// montando a SQL
        $query = "UPDATE {$this->prefix}pedidos SET pedidos_pag_codigo = :cod, pedidos_pag_tipo = 'PAGSEGURO',";
        $query .= " pedidos_pag_status = :pago, pedidos_pag_forma = :forma  WHERE pedidos_ref = :ref";

// passando parâmetros                             
        $params = array(
            ':cod' => $codigo,
            ':pago' => $pago,
            ':forma' => $forma_pag,
            ':ref' => $reference,
        );

//var_dump($params); 
// chamo o método da classe conexão que executa a SQL
        $this->ExecuteSQL($query, $params);
    }

    /*     * 
     * envia  email caso pagamento seja efetuado
     */

    private function EnviarEmail() {

// setando conteudo do email para avisos	
    }

}
