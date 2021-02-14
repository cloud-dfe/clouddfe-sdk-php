# Operações com NFe

*NOTA: estas operações funcionam em ambos os ambientes (homologação e produção)*

*NOTA: Esta operação somente pode ser executada com o token do emitente.*

**LEMBRE-SE: as consultas usando o SDK sempre retornam um objeto stdClass;**


## Consulta Status da Sefaz autorizadora


## Cria NFe

## Busca NFe

## Consulta NFe

## Carta da Correção

## Cancela NFe


## Inutiliza Faixa de Numeros de NFe


## Manifestação de Destinatário de NFe

O evento de manifestação nunca foi muito importante, a não ser quando se desejava baixar o documentos destinado, anão ser para as empresas que comercializavam combustivés que por lei tem a obrigação de manifestar todas as NFe recebidas, para encerrar o processo.

Mas a partir de 2021 as coisas estão mudando, é importante que leia nosso [POST nod Blog](https://blog.cloud-dfe.com.br/manifestacao-da-nfe-passou-a-ser-obrigatoria).

|Codigo|Tipo de Evento|Detalhes|
|:---:|:---|:---|
|210210|Ciência da Operação|O evento de "Ciência da Emissão" registra na NF-e a solicitação do destinatário para a obtenção do arquivo XML. Após o registro deste evento, é permitido que o destinatário efetue o download do arquivo XML. O Evento da "Ciência da Emissão" não representa a manifestação do destinatário sobre a operação, mas unicamente dá condições para que o destinatário obtenha o arquivo XML; este evento registra na NF-e que o destinatário da operação, constante nesta NF-e, tem conhecimento  que o documento foi emitido, mas ainda não expressou uma manifestação conclusiva para a operação. Todas as operações com o evento de solicitação de "Ciência da Emissão" deverão ter na sequência o registro do evento com a manifestação conclusiva do destinatário sobre a operação (eventos descritos nos itens 5.2, ou 5.3, ou 5.4).|
|210200|Confirmação da Operação|O evento será registrado após a realização da operação, e significa que a operação ocorreu conforme informado na NF-e. Quando a NF-e trata de uma circulação de mercadorias, o momento de registro do evento deve ser posterior à entrada física da mercadoria no estabelecimento do destinatário. Este evento também deve ser registrado para NF-e onde não existem movimentações de mercadorias, mas foram objeto de ciência por parte do destinatário, por isso é denominado de Confirmação da Operação e não Confirmação de Recebimento. Importante registrar, que após a Confirmação da Operação pelo destinatário, a empresa emitente fica impedida de cancelar a NF-e.  Apenas o evento Ciência da Emissão não inibe a autorização para o pedido de cancelamento da NF-e, conforme o prazo definido na legislação vigente.|
|210220|Desconhecimento da Operação|Este evento tem como finalidade possibilitar ao destinatário se manifestar quando da utilização indevida de sua Inscrição Estadual, por parte do emitente da NF-e, para acobertar operações fraudulentas de remessas de mercadorias para destinatário diverso.  Este evento protege o destinatário de passivos tributários envolvendo o uso indevido de sua Inscrição Estadual/CNPJ.|
|210240|Operação não Realizada|Este evento será informado pelo destinatário quando, por algum motivo, a operação legalmente acordada entre as partes não se realizou (devolução sem entrada física da mercadoria no estabelecimento do destinatário, sinistro da carga durante seu transporte, etc.).|


```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Nfe;

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

    $nfe = new Nfe($client);

    $payload = [
        'chave' => '41210222545265000108550010001010031384099675',
        'tipo_evento' => '210210'
    ];
    $resp = $nfe->manifesta($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Gerar DANFE (pdf)

Com este método será retornado o PDF da DANFE de um documento que exista na nossa base de dados.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Nfe;

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

    $nfe = new Nfe($client);

    $payload = [
        'chave' => '41210222545265000108550010001010031384099675'
    ];
    $resp = $nfe->pdf($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Download de NFe destinada

Este método irá tentar obter o documento no webservice da Receita Federal, e para ter sucesso esse documento necessita ter sido manifestado no passado.

*NOTA: poderão ser obtidas apenas as NFe destinadas ao CNPJ do emitente e NUNCA as NFe geradas por ele.*

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Nfe;

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

    $nfe = new Nfe($client);

    $payload = [
        'chave' => '41210222545265000108550010001010031384099675' //chave de NFe destinada ao CNPJ do emitente
    ];
    $resp = $nfe->download($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```


## Backup


Solicita o backup dos documentos relacionados com as NFe (NFe e eventos), gerados e registrados pela API


```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Nfe;

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

    $nfe = new Nfe($client);

    $payload = [
        'ano' => '2021',
        'mes' => '2'
    ];
    $resp = $nfe->backup($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```
