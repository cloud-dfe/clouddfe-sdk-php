<?php

require_once('../../bootstrap.php');

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Nfe;

try {

    //token de emitente
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbXAiOjcwLCJ1c3IiOiIyIiwidHAiOjIsImlhdCI6MTU4MDkzNzM3MH0.KvSUt2x8qcu4Rtp2XNTOINqR-3c5V8iyITDmLoUF_SE';
    $ambiente = Client::AMBIENTE_HOMOLOGACAO;
    $options = [
        'debug' => false
    ];

    $client = new Client([
        'ambiente' => $ambiente,
        'token' => $token,
        'options' => $options
    ]);

    $nfe = new Nfe($client);

    $payload = [
        'ultimo_nsu' => '10',
        'numero_nsu' => '0',
        'eventos' => false
    ];
    $resp = $nfe->recebidas($payload);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
