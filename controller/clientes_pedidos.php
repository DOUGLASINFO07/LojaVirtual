<?php

$smarty = new Template();

Login::MenuCliente();

$pedidos = new Pedidos();

header("access-control-allow-origin: https://ws.sandbox.pagseguro.uol.com.br");

//$notificationCode = preg_replace('/[^[:alnum:]-]/', '', $_POST['notificationCode']);
//$name = 'arquivo.txt';
//$text = var_export($_POST['notificationCode'], true);
//$file = fopen($name, 'a');
//fwrite($file, $text);
//fclose($file);
////$notificationCode = 'FE0438A274A874A8076444EF2FA02BC139A9';
//$notificationCode = 'AC6641631B671B67494CC4CD8FA7577C235C';
//$notificationCode = 'AC6641631B671B67494CC4CD8FA7577C235C';
//$notificationCode = '3E5C172B762F762FDFA444ABCF9AB6F25AD8';
//$notificationCode = preg_replace('/[^[:alnum:]-]/', '', $_POST['notificationCode']);
$notificationCode = $_POST['notificationCode'];
if (isset($_POST['notificationCode'])) {
    var_dump('Tem POST');
} else {
    var_dump('Não tem POST');
}
var_dump($notificationCode);
//$data = Config::PS_TOKEN_SBX;
//$data = Config::PS_EMAIL;

$data['token'] = Config::PS_TOKEN_SBX;
$data['email'] = Config::PS_EMAIL;
//$data['email'] = Config::PS_EMAIL;

$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $notificationCode . '?' . $data;

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);

foreach (array($xml) as $xml) {
    switch ($xml->status):
        case 1 : $status = "Processando";
            break;
        case 2 : $status = "Analise";
            break;
        case 3 : $status = "Paga";
            break;
        case 4 : $status = "Disponível";
            break;
        case 5 : $status = "Em disputa";
            break;
        case 6 : $status = "Devolvida";
            break;
        case 7 : $status = "Cancelada";
            break;
    endswitch;

//----tratando o tipo de pagamento.
//switch ($xml->paymentMethod->type):
//    case 1 : $forma_pag = "Cartao";
//        break;
//    case 2 : $forma_pag = "Boleto";
//        break;
//    case 3 : $forma_pag = "TEF";
//        break;
//    case 4 : $forma_pag = "Saldo PagSeguro";
//        break;
//    case 5 : $forma_pag = "Oi Paggo";
//        break;
//endswitch;

    $reference = $xml->reference;

    if ($reference && $status) {
        $pedidos->GetPedidosREF($reference);
        $rs_pedido = $pedidos->TotalDados();
        $prefix = Config::BD_PREFIX;
        if ($rs_pedido) {
//        $conn->atualizaPedido($reference, $status);
            $query = "UPDATE {$prefix}pedidos SET ";
            $query .= " pedidos_pag_status = :pago WHERE pedidos_ref = :ref";
            $params = array(
                ':pago' => $status,
                ':ref' => $reference,
            );
            ExecuteSQL($query, $params);
        }
    }
}

function Conectar() {

    $host = Config::BD_HOST;
    $user = Config::BD_USER;
    $senha = Config::BD_SENHA;
    $banco = Config::BD_BANCO;
    $prefix = Config::BD_PREFIX;

    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    );
    $link = new PDO("mysql:host={$host};dbname={$banco}",
            $user,
            $senha,
            $options
    );
    return $link;
}

function ExecuteSQL($query, array $params = NULL) {
    $obj = Conectar()->prepare($query);
    $teste = (is_array($params) ? count($params) : 0);
    if ($teste > 0) {
        foreach ($params as $key => $value) {
            $obj->bindValue($key, $value);
        }
    }
    return $obj->execute();
}

$pedidos->GetPedidosCliente($_SESSION['CLI']['clientes_id']);

$smarty->assign('PEDIDOS', $pedidos->GetItens());
$smarty->assign('PEDIDOS_QUANTIDADE', $pedidos->TotalDados());
$smarty->assign('PAG_ITENS', Rotas::pag_ClienteItens());
$smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
$smarty->assign('PAGINAS', $pedidos->ShowPaginacao());


$smarty->display('view/clientes_pedidos.tpl');

