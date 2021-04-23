<?php

require_once('../../bootstrap.php');

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Cte;

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

    $cte = new Cte($client);

    $payload = [
        'chave' => '50191213188739000110570010000012151581978542',
        'justificativa' => 'CTe em desacordo por x motivo'
    ];
    $resp = $cte->desacordo($payload);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
