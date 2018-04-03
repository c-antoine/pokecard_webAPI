<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors',1);
ini_set('display_errors',1);

require('braintree/lib/Braintree.php');

$gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => 'pmhprtz8ktg9f2v5',
    'publicKey' => 's6fwrbjqrvkg5728',
    'privateKey' => '20853ad895060ce72f99df12ecc9c724'
]);

/*
Send a client token to your client
*/
echo($clientToken = $gateway->clientToken()->generate());

/*
Receive a payment method nonce from your client
*/
$nonceFromTheClient = "none";
//$_POST["payment_method_nonce"];

/*
You can create a transaction using an $amount and the $nonceFromTheClient you received in the previous step:
*/
$result = $gateway->transaction()->sale([
  'amount' => '10.00',
  'paymentMethodNonce' => $nonceFromTheClient,
  'options' => [
    'submitForSettlement' => True
  ]
]);

?>
