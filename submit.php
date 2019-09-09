<?php
$url = "https://ipaytotal.solutions/api/hosted-pay/payment-request";
$key = "7aE3OKIZxusgQdpk3gwNix63MRAFLgkMJnyil88ZYMyqTSEFIo8L5KJhfi";
// Fill with real card holders info
// all these parameters are required
$data = [
    'api_key' => $key,
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'address' => $_POST['address'],
    'country' => $_POST['country'],
    'state' => $_POST['state'], // if your country US then use only 2 letter state code.
    'city' => $_POST['city'],
    'zip' => $_POST['zip'],
    'ip_address' => $_SERVER['REMOTE_ADDR'], // client device ip_address
    'email' => $_POST['email'],
    'phone_no' => $_POST['phone_no'],
    'amount' => $_POST['amount'],
    'currency' => $_POST['currency'],
    'sulte_apt_no' => 'ORDER'.time(), // transaction ref from merhant side
    'redirect_url_success' => 'http://localhost:8000/response.php', // redirect to here if transaction success
    'redirect_url_fail' => 'http://localhost:8000/response.php', // redirect to here if transaction decline
];

// create curl request
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER,[
    'Content-Type: application/json'
]);
$response = curl_exec($curl);
curl_close($curl);

$responseData = json_decode($response);

if ($responseData->payment_redirect_url != null) {
    // redirect to card payment page
    header('Location: '.$responseData->payment_redirect_url);
} else {
    // print error response
    echo('<pre>');print_r($responseData);exit;
}
