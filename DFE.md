# Operações com DFe

*NOTA: estas operações funcionam APENAS em produção.*

*NOTA: Esta operação somente pode ser executada com o token do emitente.*

**LEMBRE-SE: as consultas usando o SDK sempre retornam um objeto stdClass;**


## Busca as NFe destinadas

Este metodo traz as NFe destinadas que já foram localizadas e baixadas pelo processo automático do DFe.

NOTA: Esta busca não irá trazer as NFe que ainda não foram localizadas no webservice da Receita Federal. Lembrando que esse processo roda automáticamente nos nossos servidores a cada 2 horas e que a Receita Federal recebe as NFe em batch das SEFAZ autorizadoras e portanto existe um lapso de tempo entre a emissão e o recebimento do documento.

```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\DFe;

try {

    //token de emitente
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ ....';
    $ambiente = Client::AMBIENTE_HOMOLOGACAO;
    $options = [
        'debug' => false
    ];

    $client = new Client([
        'ambiente' => $ambiente,
        'token' => $token,
        'options' => $options
    ]);

    $dfe = new DFe($client);

    //a consulta poderá ser feita por quelquer um desses parametros, ordenados por precedência,
    //ou  seja de a chave for passada a busca será feita exclusivamente pela chave, se a chave não for passada
    //mas sim o periodo no formato "YYY-MM a busca trará todos os documentos desse período e assim por diante
    $payload = [
        "chave" => "41190808322788000127550010000010011537233885",
        //"periodo" => "2020-10",
        //"data" => "2020-10-15",
        //"cnpj" => "08322788000127"
    ];
    $resp = $dfe->buscaNfe($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Busca as CTe destinadas

Este metodo traz as CTe destinadas que já foram localizadas e baixadas pelo processo automático do DFe.

NOTA: Esta busca não irá trazer as CTe que ainda não foram localizadas no webservice da Receita Federal. Lembrando que esse processo roda automáticamente nos nossos servidores a cada 2 horas e que a Receita Federal recebe as CTe em batch das SEFAZ autorizadoras e portanto existe um lapso de tempo entre a emissão e o recebimento do documento.

```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\DFe;

try {

    //token de emitente
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ ...';
    $ambiente = Client::AMBIENTE_HOMOLOGACAO;
    $options = [
        'debug' => false
    ];

    $client = new Client([
        'ambiente' => $ambiente,
        'token' => $token,
        'options' => $options
    ]);

    $dfe = new DFe($client);

    //a consulta poderá ser feita por quelquer um desses parametros, ordenados por precedência,
    //ou  seja de a chave for passada a busca será feita exclusivamente pela chave, se a chave não for passada
    //mas sim o periodo no formato "YYY-MM a busca trará todos os documentos desse período e assim por diante
    $payload = [
        "chave" => "41190808322788000127570010000010011537233885",
        //"periodo" => "2020-10",
        //"data" => "2020-10-15",
        //"cnpj" => "08322788000127"
    ];
    $resp = $dfe->buscaNfe($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Busca o BACKUP dos documentos Destinados

Após o dia 5 de cada mês, o sistema DFe irá criar um backup em ZIP de todos os documentos recebidos naquele período, e você pode receber o link de download desse arquivo para manter os documentos de forma segura e repassa-los ao contador.

*NOTA: Esse metodo não irá criar o backup mas apenas liberar o seu download por alguns dias, para que você possa baixa-lo. Portanto se o backup não estiver disponível ainda aguarde atá o dia 6 ou solicite a geração backup ao Suporte Técnico.*

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\DFe;

try {

    //token de emitente
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

    $dfe = new DFe($client);

    $payload = [
        "tipo" => "nfe", // nfe ou cte
        "ano" => "2020",
        "mes" => "10"
    ];
    $resp = $dfe->backup($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}

```
