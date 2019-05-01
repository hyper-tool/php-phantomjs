<?php
include __DIR__ . '/vendor/autoload.php';

use JonnyW\PhantomJs\Client;

$client = Client::getInstance();
$client->isLazy();
/**
 * @see JonnyW\PhantomJs\Http\Request
 **/
$delay = 1;
$request = $client->getMessageFactory()->createRequest('https://m.gshopper.com', 'GET');
$request->setDelay($delay);
$request->setTimeout(5000);
/**
 * @see JonnyW\PhantomJs\Http\Response
 **/
$response = $client->getMessageFactory()->createResponse();

// Send the request
$client->send($request, $response);

if ($response->getStatus() === 200) {

    // Dump the requested page content
    echo json_encode($response->getContent());
//    echo $response->getContent();
} else {
    echo 'status'.$response->getStatus();
}

