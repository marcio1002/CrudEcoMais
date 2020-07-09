<?php
// require_once __DIR__ . "/../../vendor/autoload.php";
include './config.php'; 
//use Ecomais\Services\Data;
include './Services/Data.php'; 
/**
 * Pra você chamar uma classe exem:
 * use Ecomais\Services\Data;
 * primeiro chama o require_onde __DIR__ . "../vendor/autoload.php";
 * É ele que faz rodar a por.. toda e que dar dor de cabeça do caralho desculpa o palavrão.
 * ai nisso você não precisa ficar chamando o config ,
 * e não precisa ficar dando require_once.
 * Nos arquivos Models,Web,Services,Controllers e ControllersServices
 * não precisa chamar o autoload, só chama quando não usa classes
 * como por exemplos nos arquivos que estão na pasta Views
 * depois tira esse comentário
 */

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$DadosArray["email"] = EMAIL_PAGSEGURO;
$DadosArray["token"] = TOKEN_PAGSEGURO;

if ($Dados['paymentMethod'] == "creditCard") {
    $DadosArray['creditCardToken'] = $Dados['tokenCartao'];
    $DadosArray['installmentQuantity'] = $Dados['qntParcelas'];
    $DadosArray['installmentValue'] = $Dados['valorParcelas'];
    $DadosArray['noInterestInstallmentQuantity'] = $Dados['noIntInstalQuantity'];
    $DadosArray['creditCardHolderName'] = $Dados['creditCardHolderName'];
    $DadosArray['creditCardHolderCPF'] = $Dados['creditCardHolderCPF'];
    $DadosArray['creditCardHolderBirthDate'] = $Dados['creditCardHolderBirthDate'];
    $DadosArray['creditCardHolderAreaCode'] = $Dados['senderAreaCode'];
    $DadosArray['creditCardHolderPhone'] = $Dados['senderPhone'];
    $DadosArray['billingAddressStreet'] = $Dados['billingAddressStreet'];
    $DadosArray['billingAddressNumber'] = $Dados['billingAddressNumber'];
    $DadosArray['billingAddressComplement'] = $Dados['billingAddressComplement'];
    $DadosArray['billingAddressDistrict'] = $Dados['billingAddressDistrict'];
    $DadosArray['billingAddressPostalCode'] = $Dados['billingAddressPostalCode'];
    $DadosArray['billingAddressCity'] = $Dados['billingAddressCity'];
    $DadosArray['billingAddressState'] = $Dados['billingAddressState'];
    $DadosArray['billingAddressCountry'] = $Dados['billingAddressCountry'];
} elseif ($Dados['paymentMethod'] == "boleto") {
    
} elseif ($Dados['paymentMethod'] == "eft") {
    $DadosArray['bankName'] = $Dados['bankName'];
}

$DadosArray['paymentMode'] = 'default';
$DadosArray['paymentMethod'] = $Dados['paymentMethod'];


$DadosArray['receiverEmail'] = EMAIL_LOJA;
$DadosArray['currency'] = $Dados['currency'];
$DadosArray['extraAmount'] = $Dados['extraAmount'];


$DadosArray['notificationURL'] = URL_NOTIFICACAO;
$DadosArray['reference'] = $Dados['reference'];
$DadosArray['senderName'] = $Dados['senderName'];
$DadosArray['senderCPF'] = $Dados['senderCPF'];
$DadosArray['senderAreaCode'] = $Dados['senderAreaCode'];
$DadosArray['senderPhone'] = $Dados['senderPhone'];
$DadosArray['senderEmail'] = $Dados['senderEmail'];
$DadosArray['senderHash'] = $Dados['hashCartao'];
$DadosArray['shippingAddressRequired'] = $Dados['shippingAddressRequired'];
$DadosArray['shippingAddressStreet'] = $Dados['shippingAddressStreet'];
$DadosArray['shippingAddressNumber'] = $Dados['shippingAddressNumber'];
$DadosArray['shippingAddressComplement'] = $Dados['shippingAddressComplement'];
$DadosArray['shippingAddressDistrict'] = $Dados['shippingAddressDistrict'];
$DadosArray['shippingAddressPostalCode'] = $Dados['shippingAddressPostalCode'];
$DadosArray['shippingAddressCity'] = $Dados['shippingAddressCity'];
$DadosArray['shippingAddressState'] = $Dados['shippingAddressState'];
$DadosArray['shippingAddressCountry'] = $Dados['shippingAddressCountry'];
$DadosArray['shippingType'] = $Dados['shippingType'];
$DadosArray['shippingCost'] = $Dados['shippingCost'];

$buildQuery = http_build_query($DadosArray);
$url = URL_PAGSEGURO . "transactions";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $buildQuery);
$retorno = curl_exec($curl);
curl_close($curl);
$xml = simplexml_load_string($retorno);

//cartão de crédito 
if ($xml->paymentMethod->type == 1) {
    $result_cadastrar = "INSERT INTO pagamentos (tipo_pg, cod_trans, status, carrinho_id, created) VALUES (:tipo_pg, :cod_trans, :status, :carrinho_id, NOW())";
    $cadastrar = $conn->prepare($result_cadastrar);
} 
//boleto
elseif ($xml->paymentMethod->type == 2) { 
    $result_cadastrar = "INSERT INTO pagamentos (tipo_pg, cod_trans, status, link_boleto,carrinho_id, created) VALUES (:tipo_pg, :cod_trans, :status, :link_boleto, :carrinho_id, NOW())";
    $cadastrar = $conn->prepare($result_cadastrar);
    $cadastrar->bindParam(':link_boleto', $xml->paymentLink, PDO::PARAM_STR);
} 
//débito online
elseif ($xml->paymentMethod->type == 3) {
    $result_cadastrar = "INSERT INTO pagamentos (tipo_pg, cod_trans, status, link_db_online,carrinho_id, created) VALUES (:tipo_pg, :cod_trans, :status, :link_db_online, :carrinho_id, NOW())";
    $cadastrar = $conn->prepare($result_cadastrar);
    $cadastrar->bindParam(':link_db_online', $xml->paymentLink, PDO::PARAM_STR);
    
}


$cadastrar->bindParam(':tipo_pg', $xml->paymentMethod->type, PDO::PARAM_INT);
$cadastrar->bindParam(':cod_trans', $xml->code, PDO::PARAM_STR);
$cadastrar->bindParam(':status', $xml->status, PDO::PARAM_INT);
$cadastrar->bindParam(':carrinho_id', $xml->reference, PDO::PARAM_STR);

$cadastrar->execute();

$retorna = ['erro' => true, 'dados' => $xml, 'DadosArray' => $DadosArray];
header('Content-Type: application/json');
echo json_encode($retorna);