# Operações com o cadastro do EMITENTE

*NOTA: estas operações funcionam em ambos os ambientes (homologação e produção)*

## Atualização de cadastro do Emitente

A API permite que o emitente atualize seus próprios dados cadastrais, isso normalmente ocorre quando existe alguma alteração como mudança de endereço por exemplo.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Emitente;

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

    $emitente = new Emitente($client);

    $payload = [
        'nome' => 'FULANO DA SILVA',
        'razao' => 'FULANO DA SILVA LTDA',
        "cnae" => '1234567',
        "crt" => 3,
        'ie' => '9876544321',
        'im' => '1234',
        'csc' => '9KLRH4IEMIQ58TKBOLRPHNDAN0SJEOKFK453',
        'cscid' => '2',
        'tar' => null,
        'login_prefeitura' => null,
        'senha_prefeitura' => null,
        'client_id_prefeitura' => null,
        'client_secret_prefeitura' =>null,
        'aliquota_simples' => null,
        'telefone' => '115555555',
        'email' => 'fulano@fulano.com.br',
        'rua' => 'AL JAPURUS',
        'numero' => '1345',
        'complemento' => 'Sala 111',
        'bairro' => 'BRAS',
        'municipio' => 'São Paulo',
        'cmun' => '3550308',
        'uf' => 'SP',
        'cep' => '02233000',
        'logo' => null
        
    ];
    $resp = $emitente->atualiza($payload);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```


## Troca do TOKEN de acesso a API

E permite também que o emitente possa substituir seu TOKEN atual por um novo, isso pode ocorrer caso haja suspeita de violação da segurança do seu aplicativo.

Ao executar essa chamada o TOKEN anterior deixará de validar e apenas o novo TOKEN criado porderá ser usado.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Emitente;

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

    $emitente = new Emitente($client);
    $resp = $emitente->token();

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

