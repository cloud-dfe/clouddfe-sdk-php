# Operações com CTe

*NOTA: estas operações funcionam em ambos os ambientes (homologação e produção)*

*NOTA: Esta operação somente pode ser executada com o token do emitente.*

**LEMBRE-SE: as consultas usando o SDK sempre retornam um objeto stdClass;**


## Consulta Status da Sefaz autorizadora

Consulta o status da SEFAZ autorizadora

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $resp = $cte->status();

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Cria CTe

Este método é usado para GERAR uma nova CTe

É muito importante que estude a [nossa documentação](https://doc.cloud-dfe.com.br/v1/cteos/manual/index.html) para poder enviar essa chamada.


```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $payload = [
        "cfop" => "5353",
        "natureza_operacao" => "PRESTACAO DE SERVIÇO",
        "numero" => "64",
        "serie" => "1",
        "data_emissao" => "2020-11-24T03:00:00-03:00",
        "tipo_operacao" => "0",
        "codigo_municipio_envio" => "2408003",
        "nome_municipio_envio" => "MOSSORO",
        "uf_envio" => "RN",
        "tipo_servico" => "6",
        "codigo_municipio_inicio" => "2408003",
        "nome_municipio_inicio" => "Mossoró",
        "uf_inicio" => "RN",
        "codigo_municipio_fim" => "2408003",
        "nome_municipio_fim" => "Mossoró",
        "uf_fim" => "RN",
        "valores" => [
            "servico" => "0.00",
            "valor_total" => "0.00",
            "valor_receber" => "0.00",
            "quantidade" => "10.00"
        ],
        "imposto" => [
            "icms" => [
                "situacao_tributaria" => "20",
                "valor_base_calculo" => "0.00",
                "aliquota" => "12.00",
                "valor" => "0.00",
                "reducao_base_calculo" => "50.00"
            ],
            "federais" => [
                "valor_pis" => "0.00",
                "valor_cofins" => "0.00",
                "valor_ir" => "12.00",
                "valor_inss" => "0.00",
                "valor_csll" => "50.00"
            ]
        ],
        "modal_rodoviario" => [
            "taf" => "020335171251",
            "numero_registro_estadual" => "0203351712510203351712515"
        ],
        "tomador" => [
            "indicador_inscricao_estadual" => "1",
            "cnpj" => "15495526000128",
            "inscricao_estadual" => "212055510",
            "nome" => "EMPRESA MODELO",
            "razao_social" => "EMPRESA MODELO",
            "telefone" => "8499995555",
            "endereco" => [
                "logradouro" => "AVENIDA TESTE",
                "numero" => "444",
                "bairro" => "CENTRO",
                "codigo_municipio" => "2408003",
                "nome_municipio" => "Mossoró",
                "cep" => "59603330",
                "uf" => "RN",
                "codigo_pais" => "1058",
                "nome_pais" => "BRASIL",
                "email" => "teste@teste.com.br"
            ]
        ],
        "componentes_valor" => [
            [
                "nome" => "teste2",
                "valor" => "1999.00"
            ]
        ],
        "observacao" => ""
    ];
    $resp = $cte->cria($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```


## Cria a pre-visualização da DACTe

Este método é usado para GERAR uma pre-visualização da DACTe

É muito importante que estude a [nossa documentação](https://doc.cloud-dfe.com.br/v1/cteos/manual/index.html) para poder enviar essa chamada.


```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $payload = [
        "cfop" => "5353",
        "natureza_operacao" => "PRESTACAO DE SERVIÇO",
        "numero" => "64",
        "serie" => "1",
        "data_emissao" => "2020-11-24T03:00:00-03:00",
        "tipo_operacao" => "0",
        "codigo_municipio_envio" => "2408003",
        "nome_municipio_envio" => "MOSSORO",
        "uf_envio" => "RN",
        "tipo_servico" => "6",
        "codigo_municipio_inicio" => "2408003",
        "nome_municipio_inicio" => "Mossoró",
        "uf_inicio" => "RN",
        "codigo_municipio_fim" => "2408003",
        "nome_municipio_fim" => "Mossoró",
        "uf_fim" => "RN",
        "valores" => [
            "servico" => "0.00",
            "valor_total" => "0.00",
            "valor_receber" => "0.00",
            "quantidade" => "10.00"
        ],
        "imposto" => [
            "icms" => [
                "situacao_tributaria" => "20",
                "valor_base_calculo" => "0.00",
                "aliquota" => "12.00",
                "valor" => "0.00",
                "reducao_base_calculo" => "50.00"
            ],
            "federais" => [
                "valor_pis" => "0.00",
                "valor_cofins" => "0.00",
                "valor_ir" => "12.00",
                "valor_inss" => "0.00",
                "valor_csll" => "50.00"
            ]
        ],
        "modal_rodoviario" => [
            "taf" => "020335171251",
            "numero_registro_estadual" => "0203351712510203351712515"
        ],
        "tomador" => [
            "indicador_inscricao_estadual" => "1",
            "cnpj" => "15495526000128",
            "inscricao_estadual" => "212055510",
            "nome" => "EMPRESA MODELO",
            "razao_social" => "EMPRESA MODELO",
            "telefone" => "8499995555",
            "endereco" => [
                "logradouro" => "AVENIDA TESTE",
                "numero" => "444",
                "bairro" => "CENTRO",
                "codigo_municipio" => "2408003",
                "nome_municipio" => "Mossoró",
                "cep" => "59603330",
                "uf" => "RN",
                "codigo_pais" => "1058",
                "nome_pais" => "BRASIL",
                "email" => "teste@teste.com.br"
            ]
        ],
        "componentes_valor" => [
            [
                "nome" => "teste2",
                "valor" => "1999.00"
            ]
        ],
        "observacao" => ""
    ];
    $resp = $cte->preview($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Busca CTe

Busca pelos documentos armazenados em nossa base de dados

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $resp = $cte->busca([
        "numero_inicial" => 1710,
        "numero_final" => 101002,
        "serie" => 1,
        //"data_inicial" => "2019-12-01",
        //"data_final" => "2019-12-31",
        //"cancel_inicial" => "2019-12-01", // Cancelamento
        //"cancel_final" => "2019-12-31"
    ]);  //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Consulta CTe

Consulta uma CTe em nossa base de dados. Este método é normalmente usado logo após a CTe ter sido enviada para api.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $resp = $cte->consulta([
        'chave' => '41210222545265000108550010001010021121093113'
    ]);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```


## Carta da Correção

A carta de correção é usada para corrigir algum equivoco simples que tenha ocorrido na emissão da CTe, e que não tem impacto nos dados fiscais da mesma.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $payload = [
        'chave' => '41210222545265000108550010001010031384099675',
        'correcoes' => [
            [
                'grupo_corrigido' => 'ide',
                'campo_corrigido' => 'natureza_operacao',
                'valor_corrigido' => 'PRESTACAO DE SERVIÇO'
            ]
        ]
    ];
    $resp = $cte->correcao($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

## Cancela CTe

Este método solicita o cancelamento da CTe à Sefaz autorizadora.

*NOTA: para poder cancelar uma CTe utilizando a API é necessário que o documento exista em nossa base de dados.*

**NOTA: Atenção para os prazos limite para realizar o cancelamento de CTe, de forma geral esse limite é de 24 horas a partir da data de emissão do documento. Após esse limite as CTe não poderão mais serem canceladas e para reverter a operação será necessário fazer uma CTe de entrada das mercadorias.**

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $payload = [
        'chave' => '41210222545265000108550010001010021121093113',
        'justificativa' => 'teste de cancelamento' //minimo de 15 caracteres
    ];
    $resp = $cte->cancela($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Inutiliza Faixa de Numeros de CTe

Sempre que por algum motivo tenham sido pulados numeros de CTe, esses numeros deve ser inulizados.

*NOTA: mesmo que deseje encerrar apenas um unico numero de CTe, nessa chamada deve ser passado o numero inicial e final IGUAIS.*

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $payload = [
        'numero_inicial' => '101004',
        'numero_final' => '101004',
        'serie' => '1',
        'justificativa' => 'teste de inutilização'
    ];
    $resp = $cte->inutiliza($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Gerar DACTE (pdf)

Com este método será retornado o PDF da DACTE de um documento que exista na nossa base de dados.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $payload = [
        'chave' => '41210222545265000108550010001010031384099675'
    ];
    $resp = $cte->pdf($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```


## Backup

Solicita o backup dos documentos relacionados com as CTe (CTe e eventos), gerados e registrados pela API


```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $payload = [
        'ano' => '2021',
        'mes' => '2'
    ];
    $resp = $cte->backup($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Importa

Importa o documento fiscal na API


```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $payload = [
        "xml" => base64_encode(file_get_contents("caminho/nome.xml"))
    ];
    $resp = $cte->importa($payload);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Evento de desacordo

Solicita manifestação de prestação de serviço em desacordo


```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\CteOS;

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

    $cte = new CteOS($client);

    $payload = [
        'chave' => '50191213188739000110670010000012151581978542',
        'justificativa' => 'CTe em desacordo por x motivo'
    ];
    $resp = $cte->desacordo($payload);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}


```
