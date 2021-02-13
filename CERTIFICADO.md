# Operações com os CERTIFICADOS

*NOTA: estas operações funcionam em ambos os ambientes (homologação e produção)*
*NOTA: Esta operação somente pode ser executada com o token do emitente.*

**LEMBRE-SE: as consultas usando o SDK sempre retornam um objeto stdClass;**

O certificado usado é apenas o modelo A1, esse tito de certificado vence a cada 12 meses, então necessita ser atualizado periodicamente.

## Atualização do CERTIFICADO DIGITAL

Este metodo serve para inserir o certificado para o emitente ou atualizar o certificado vencido (ou a vencer) do emitente.

*NOTA: O certificado será VALIDADO antes de ser inserido no registro do emitente, e deve estar válido e pertencer ao CNPJ/CPF do emitente, caso contrario você rebeberá um aviso de erro e o certificado não será aceito.*

```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Certificado;

try {

    //token de emitente
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9 ....';
    $ambiente = Client::AMBIENTE_HOMOLOGACAO;
    $options = [
        'debug' => false
    ];

    $client = new Client([
        'ambiente' => $ambiente,
        'token' => $token,
        'options' => $options
    ]);

    $certificado = new Certificado($client);

    $certificado = base64_encode(file_get_contents('certificado.pfx'));

    $payload = [
        'certificado' => $certificado, // nesse campo deve colocado o certificado PFX convertido em base64
        'senha' => 'senha' //senha em text plain
    ];
    $resp = $certificado->atualiza($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

## Consulta da disponibilidade e validade do Certificado

Quando for necessário pode ser consultado o certificado que está cadastrado para o emitente, para saber se o mesmo já foi enviado e registrado na API.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Certificado;

try {

    //token de emitente
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIU .....';
    $ambiente = Client::AMBIENTE_HOMOLOGACAO;
    $options = [
        'debug' => false
    ];

    $client = new Client([
        'ambiente' => $ambiente,
        'token' => $token,
        'options' => $options
    ]);

    $certificado = new Certificado($client);

    $resp = $certificado->mostra();

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```
