<?php

require_once('../bootstrap.php');

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Nfe;

try {

    //token de emitente
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbXAiOiI4IiwidXNyIjoiMTkiLCJ0cCI6MiwiaWF0IjoxNTgyODA5MzA2fQ.P0f6CAv9MFpLjmaLKU2V_MCFuFO2xzHZj7xQ56SVJKM';
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

    $resp = $nfe->pdf([
        'chave' => '32200227701830000100550010000017181215176775'
    ]);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
