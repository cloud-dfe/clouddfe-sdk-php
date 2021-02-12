<?php

require_once('../../bootstrap.php');

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Softhouse;

try {

    //token da softhouse
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbXAiOjAsInVzciI6MiwidHAiOjEsImlhdCI6MTU3MjU0NzUyMX0.MfpnIPkIhqcPVUU7VQDK3-ANDAcRccnNubNIl7Na5_4';
    $ambiente = Client::AMBIENTE_HOMOLOGACAO;
    $options = [
        'debug' => false
    ];

    $client = new Client([
        'ambiente' => $ambiente,
        'token' => $token,
        'options' => $options
    ]);

    $softhouse = new Softhouse($client);

    $payload = [
        'status' => ''
    ];
    $resp = $softhouse->listaEmitentes($payload);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
