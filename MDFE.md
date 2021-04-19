# Operações com MDFe

*NOTA: estas operações funcionam em ambos os ambientes (homologação e produção)*

*NOTA: Esta operação somente pode ser executada com o token do emitente.*

**LEMBRE-SE: as consultas usando o SDK sempre retornam um objeto stdClass;**


## Consulta Status da Sefaz autorizadora

Consulta o status da SEFAZ autorizadora

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $resp = $mdfe->status();

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Cria MDFe

Este método é usado para GERAR uma nova MDFe

É muito importante que estude a [nossa documentação](https://doc.cloud-dfe.com.br/v1/mdfe/manual/index.html) para poder enviar essa chamada.


```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $payload = [
        "tipo_operacao" => "2",
        "numero" => "26",
        "serie" => "1",
        "data_emissao" => "2020-11-25T09:21:42-00:00",
        "uf_inicio" => "RN",
        "uf_fim" => "GO",
        "municipios_carregamento" => [
            [
                "codigo_municipio" => "2408003",
                "nome_municipio" => "Mossoró"
            ]
        ],
        "percursos" => [
            [
                "uf" => "PB"
            ], [
                "uf" => "PE"
            ], [
                "uf" => "BA"
            ]
        ],
        "municipios_descarregamento" => [
            [
                "codigo_municipio" => "5200050",
                "nome_municipio" => "Abadia de Goiás",
                "nfes" => [
                    [
                        "chave" => "34255501343220005109556010100010641225557671"
                    ]
                ]
            ]
        ],
        "valores" => [
            "valor_total_carga" => "100.00",
            "codigo_unidade_medida_peso_bruto" => "01",
            "peso_bruto" => "1000.000"
        ],
        "informacao_adicional_fisco" => null,
        "informacao_complementar" => null,
        "modal_rodoviario" => [
            "rntrc" => "57838055",
            "ciot" => [],
            "contratante" => [],
            "vale_pedagio" => [],
            "veiculo" => [
                "codigo" => "000000001",
                "placa" => "FFF1257",
                "renavam" => "335540391",
                "tara" => "0",
                "tipo_rodado" => "01",
                "tipo_carroceria" => "00",
                "uf" => "MT",
                "proprietario" => [
                    "cnpj" => "15555270000224",
                    "rntrc" => "33838121",
                    "nome" => "TESTES TRANSPORTES LTDA",
                    "inscricao_estadual" => "ISENTO",
                    "uf" => "MT",
                    "tipo" => "0"
                ],
                "condutores" => [
                    [
                        "nome" => "JOAO TESTE",
                        "cpf" => "12456547872"
                    ]
                ]
            ],
            "reboque" => []
        ],
        "tipo_transporte" => "2"
    ];
    $resp = $mdfe->cria($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Cria a pre-visualização da DAMDFe

Este método é usado para GERAR uma pre-visualização da DAMDFe

É muito importante que estude a [nossa documentação](https://doc.cloud-dfe.com.br/v1/mdfe/manual/index.html) para poder enviar essa chamada.


```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $payload = [
        "tipo_operacao" => "2",
        "numero" => "26",
        "serie" => "1",
        "data_emissao" => "2020-11-25T09:21:42-00:00",
        "uf_inicio" => "RN",
        "uf_fim" => "GO",
        "municipios_carregamento" => [
            [
                "codigo_municipio" => "2408003",
                "nome_municipio" => "Mossoró"
            ]
        ],
        "percursos" => [
            [
                "uf" => "PB"
            ], [
                "uf" => "PE"
            ], [
                "uf" => "BA"
            ]
        ],
        "municipios_descarregamento" => [
            [
                "codigo_municipio" => "5200050",
                "nome_municipio" => "Abadia de Goiás",
                "nfes" => [
                    [
                        "chave" => "34255501343220005109556010100010641225557671"
                    ]
                ]
            ]
        ],
        "valores" => [
            "valor_total_carga" => "100.00",
            "codigo_unidade_medida_peso_bruto" => "01",
            "peso_bruto" => "1000.000"
        ],
        "informacao_adicional_fisco" => null,
        "informacao_complementar" => null,
        "modal_rodoviario" => [
            "rntrc" => "57838055",
            "ciot" => [],
            "contratante" => [],
            "vale_pedagio" => [],
            "veiculo" => [
                "codigo" => "000000001",
                "placa" => "FFF1257",
                "renavam" => "335540391",
                "tara" => "0",
                "tipo_rodado" => "01",
                "tipo_carroceria" => "00",
                "uf" => "MT",
                "proprietario" => [
                    "cnpj" => "15555270000224",
                    "rntrc" => "33838121",
                    "nome" => "TESTES TRANSPORTES LTDA",
                    "inscricao_estadual" => "ISENTO",
                    "uf" => "MT",
                    "tipo" => "0"
                ],
                "condutores" => [
                    [
                        "nome" => "JOAO TESTE",
                        "cpf" => "12456547872"
                    ]
                ]
            ],
            "reboque" => []
        ],
        "tipo_transporte" => "2"
    ];
    $resp = $mdfe->preview($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Busca MDFe

Busca pelos documentos armazenados em nossa base de dados

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $resp = $mdfe->busca([
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

## Consulta MDFe

Consulta uma MDFe em nossa base de dados. Este método é normalmente usado logo após a MDFe ter sido enviada para api.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $resp = $mdfe->consulta([
        'chave' => '41210222545265000108550010001010021121093113'
    ]);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```


## Encerra

Realiza o evento de encerramento da MDFe, deve ser utilizado os dados da localização de termino da viagem

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $payload = [
        'chave' => '41210222545265000108580010001010031384099675',
        'codigo_uf' => '41',
        'codigo_municipio' => '4145678'
    ];
    $resp = $mdfe->encerra($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

## Cancela MDFe

Este método solicita o cancelamento da MDFe à Sefaz autorizadora.

*NOTA: para poder cancelar uma MDFe utilizando a API é necessário que o documento exista em nossa base de dados.*

**NOTA: Atenção para os prazos limite para realizar o cancelamento de MDFe, de forma geral esse limite é de 24 horas a partir da data de emissão do documento. Após esse limite as MDFe não poderão mais serem canceladas e para reverter a operação será necessário fazer uma MDFe de entrada das mercadorias.**

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $payload = [
        'chave' => '41210222545265000108550010001010021121093113',
        'justificativa' => 'teste de cancelamento' //minimo de 15 caracteres
    ];
    $resp = $mdfe->cancela($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Inclui um condutor

É utilizado para incluir conutores ao longo do percurso

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $payload = [
        'chave' => '41210222545265000108580010001010031384099675',
        'nome' => 'JOAO',
        'cpf' => '01234567890'
    ];
    $resp = $mdfe->condutor($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Gerar DAMDFE (pdf)

Com este método será retornado o PDF da DAMDFE de um documento que exista na nossa base de dados.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $payload = [
        'chave' => '41210222545265000108550010001010031384099675'
    ];
    $resp = $mdfe->pdf($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```


## Backup

Solicita o backup dos documentos relacionados com as MDFe (MDFe e eventos), gerados e registrados pela API


```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $payload = [
        'ano' => '2021',
        'mes' => '2'
    ];
    $resp = $mdfe->backup($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Offline

Será executado o processamento das MDFe que foram criadas em contingencia offline

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $resp = $mdfe->offline();

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```
## Abertos(Não encerrados)

Busca os MDFe que ainda não foram encerrados

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $resp = $mdfe->abertos();

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Incluir NFe

Inclui a chave de uma NFe quando o MDFe foi emitido com o campo carregamento_posterior = 1

*NOTA: Para ser possivel realizar esse evento o MDFe alem do campo carregamento_posterior = 1 deve ser feito em operação interna, e não deve ser informado nenhuma chave de acesso nos municipios de descarregamento.*

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $payload = [
        'chave' => '50191113188739000110580010000012141581978541',
        'codigo_municipio_carregamento' => '2408003',
        'nome_municipio_carregamento' => 'Mossoró',
        'codigo_municipio_descarregamento' => '5200050',
        'nome_municipio_descarregamento' => 'Abadia de Goiás',
        'chave_nfe' => '34255501343220005109556010100010641225557671'
    ];
    $resp = $mdfe->nfe($payload); //os payloads são sempre ARRAYS;

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
use CloudDfe\Sdk\Mdfe;

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

    $mdfe = new Mdfe($client);

    $payload = [
        "xml" => base64_encode(file_get_contents("caminho/nome.xml"))
    ];
    $resp = $mdfe->importa($payload);

    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}

```
