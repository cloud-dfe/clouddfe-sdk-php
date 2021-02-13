# Operações da SOFTHOUSE

*NOTA: estas operações funcionam em ambos os ambientes (homologação e produção)*

*NOTA: Esta operação somente pode ser executada com o token da SOFTHOUSE.*

**LEMBRE-SE: as consultas usando o SDK sempre retornam um objeto stdClass;**

## Registrar um novo Emitente

A softhouse pode registrar seu emitente através do método abaixo.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Softhouse;

try {

    //token da softhouse
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9 .....';
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
        //"cpf" => '12345678901',
        "cnae" => '12369875',
        "crt" => '1', // Regime tributário
        "ie" => '12369875',
        "im" => '12369875',
        "suframa" => '12369875',
        "csc" => '...', // token para emissão de NFCe fornecido pela SEFAZ autorizadora para o emitente
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
        "municipio" => 'CIDADE TESTE',
        "cmun" => '5300108', // Código do IBGE
        "uf" => 'PR',
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
    $resp = $softhouse->criaEmitente($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Consultar os dados do Emitente

Os dados cadastrais de um emitente pode ser retornados a softhouse pr este método.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Softhouse;

try {

    //token da softhouse
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

    $softhouse = new Softhouse($client);

    $payload = [
        'cnpj '=> '25447784000121'
    ];
    $resp = $softhouse->mostraEmitente($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

## Altera dados cadastrais do Emitente

No caso de uma atualização de dados cadastrais do emitente, prefira usar o método do próprio emitente.

*NOTA: Nem o CNPJ, nem o CPF poderão ser alterados por esse método.*

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Softhouse;

try {

    //token da softhouse
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9 .....';
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
        "cnpj" => '47853098000193', //deve ser o mesmo usado na criação do registro pois será a chave para essa alteração
        //"cpf" => '12345678901', //deve ser o mesmo usado na criação do registro pois será a chave para essa alteração
        "cnae" => '12369875',
        "crt" => '1', // Regime tributário
        "ie" => '12369875',
        "im" => '12369875',
        "suframa" => '12369875',
        "csc" => '...', // token para emissão de NFCe fornecido pela SEFAZ autorizadora para o emitente
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
        "municipio" => 'CIDADE TESTE',
        "cmun" => '5300108', // Código do IBGE
        "uf" => 'PR',
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
    $resp = $softhouse->criaEmitente($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Listar os emitentes já cadastrados (ativos ou deletados)

Use este método para obter uma listagem de todos os emitentes cadastrados da sua empresa.


```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Softhouse;

try {

    //token da softhouse
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

    $softhouse = new Softhouse($client);

    $payload = [
        'status' => 'deletados' //ativos ou deletados
    ];
    $resp = $softhouse->listaEmitentes($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

## Deletar o emitente

Caso a softhouse deixe de trabalhar com algum emitente, será necessário enviar a solicitação de DELEÇÃO do mesmo.

Esse processo é um SOFTDELETE, e portanto os dados não serão removidos imediatamente, porém será interrompida a cobrança reletiva a esse emitente, se existir alguma.

**Além disso, após 30 dias, TODOS os dados relativos a esse emitente serão removidos de forma definitiva e irreversivel da API.**

```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Softhouse;

try {

    //token da softhouse
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9 ...';
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
        'cnpj '=> '25447784000121'
    ];
    $resp = $softhouse->deletaEmitente($payload);  //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}

```
