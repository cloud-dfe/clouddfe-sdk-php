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
        "nome" => 'EMPRESA TESTE',
        "razao" => 'EMPRESA TESTE',
        "cnpj" => '47853098000193',
        "cpf" => '12345678901',
        "cnae" => '12369875',
        "crt" => '1', // Regime tributário
        "ie" => '12369875',
        "im" => '12369875',
        "suframa" => '12369875',
        "csc" => '...', // token para emissão de NFCe
        "cscid" => '000001',
        "tar" => 'C92920029-12', // tar BPe
        "login_prefeitura" => null,
        "senha_prefeitura" => null,
        "client_id_prefeitura" => null,
        "client_secret_prefeitura" => null,
        "aliquota_simples" => null,
        "telefone" => '46998895532',
        "email" => 'empresa@teste.com',
        "rua" => 'TESTE',
        "numero" => '1',
        "complemento" => 'NENHUM',
        "bairro" => 'TESTE',
        "municipio" => 'CIDADE TESTE', // IBGE
        "cmun" => '5300108', // IBGE
        "uf" => 'PR', // IBGE
        "cep" => '85000100',
        "logo" => 'useyn56j4mx35m5j6_JSHh734khjd...saasjda', // BASE 64
        "plano" => 'Emitente',
        "documentos" => [
            "nfe" => true,
            "nfce" => true,
            "nfse" => true,
            "mdfe" => true,
            "cte" => true,
            "cteos" => true,
            "bpe" => true
        ]
    ];
    $resp = $softhouse->criaEmitente($payload);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
