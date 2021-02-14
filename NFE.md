# Operações com NFe

*NOTA: estas operações funcionam em ambos os ambientes (homologação e produção)*

*NOTA: Esta operação somente pode ser executada com o token do emitente.*

**LEMBRE-SE: as consultas usando o SDK sempre retornam um objeto stdClass;**


## Consulta Status da Sefaz autorizadora

Consulta o status da SEFAZ autorizadora

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

    $resp = $nfe->status();

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Cria NFe

Este método é usado paa GERAR uma nova NFe

*NOTA: como o processo é ASSINCRONO, então é necessária que uma segunda chamada (**Consulta**) seja feita alguns segundos após o envio desta chamada para se obter o resultado do precessamento da NFe pela SEFAZ autorizadora, isso se esta chamada retornar sucesso, é claro.*

É muito importante que estude a [nossa documentação](https://doc.cloud-dfe.com.br/v1/nfe/manual/index.html) para poder enviar essa chamada.


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

    $paylod = [
        "natureza_operacao" => "VENDA DENTRO DO ESTADO",
        "serie" => "1",
        "numero" => "101003",
        "data_emissao" => "2021-02-09T17:00:00-03:00",
        "data_entrada_saida" => "2021-02-09T17:00:00-03:00",
        "tipo_operacao" => "1",
        "local_destino" => "1",
        "finalidade_emissao" => "1",
        "consumidor_final" => "1",
        "presenca_comprador" => "9",
        "intermediario" => [
            "indicador" => "0"
        ],
        "notas_referenciadas" => [],
        "destinatario" => [
            "cpf" => "01234567890",
            "nome" => "EMPRESA MODELO",
            "indicador_inscricao_estadual" => "9",
            "inscricao_estadual" => null,
            "endereco" => [
                "logradouro" => "AVENIDA TESTE",
                "numero" => "444",
                "bairro" => "CENTRO",
                "codigo_municipio" => "4108403",
                "nome_municipio" => "Mossoro",
                "uf" => "PR",
                "cep" => "59653120",
                "codigo_pais" => "1058",
                "nome_pais" => "BRASIL",
                "telefone" => "8499995555"
            ]
        ],
        "itens" => [
            [
                "numero_item" => "1",
                "codigo_produto" => "000297",
                "descricao" => "SAL GROSSO 50KGS",
                "codigo_ncm" => "84159020",
                "cfop" => "5102",
                "unidade_comercial" => "SC",
                "quantidade_comercial" => 10,
                "valor_unitario_comercial" => "22.45",
                "valor_bruto" => "224.50",
                "unidade_tributavel" => "SC",
                "quantidade_tributavel" => "10.00",
                "valor_unitario_tributavel" => "22.45",
                "origem" => "0",
                "inclui_no_total" => "1",
                "imposto" => [
                    "valor_total_tributos" => 9.43,
                    "icms" => [
                        "situacao_tributaria" => "102",
                        "aliquota_credito_simples" => "0",
                        "valor_credito_simples" => "0",
                        "modalidade_base_calculo" => "3",
                        "valor_base_calculo" => "0.00",
                        "modalidade_base_calculo_st" => "4",
                        "aliquota_reducao_base_calculo" => "0.00",
                        "aliquota" => "0.00",
                        "aliquota_final" => "0.00",
                        "valor" => "0.00",
                        "margem_valor_adicionado_st" => "0.00",
                        "reducao_base_calculo_st" => "0.00",
                        "base_calculo_st" => "0.00",
                        "aliquota_st" => "0.00",
                        "valor_st" => "0.00"
                    ],
                    "fcp" => [
                        "aliquota" => "1.65"
                    ],
                    "pis" => [
                        "situacao_tributaria" => "01",
                        "valor_base_calculo" => 224.5,
                        "aliquota" => "1.65",
                        "valor" => "3.70"
                    ],
                    "cofins" => [
                        "situacao_tributaria" => "01",
                        "valor_base_calculo" => 224.5,
                        "aliquota" => "7.60",
                        "valor" => "17.06"
                    ]
                ],
                "valor_desconto" => 0,
                "valor_frete" => 0,
                "valor_seguro" => 0,
                "valor_outras_despesas" => 0,
                "informacoes_adicionais_item" => "Valor aproximado tributos R$: 9,43 (4,20%) Fonte: IBPT"
            ]
        ],
        "icms_base_calculo" => 0,
        "icms_valor_total" => 0,
        "valor_produtos" => 224.5,
        "valor_frete" => 0,
        "valor_seguro" => 0,
        "valor_desconto" => 0,
        "valor_pis" => 3.7,
        "valor_cofins" => 17.06,
        "valor_outras_despesas" => 0,
        "valor_total" => 224.5,
        "frete" => [
            "modalidade_frete" => "0",
            "volumes" => [
                [
                    "quantidade" => "10",
                    "especie" => null,
                    "marca" => "TESTE",
                    "numero" => null,
                    "peso_liquido" => 500,
                    "peso_bruto" => 500
                ]
            ]
        ],
        "cobranca" => [
            "fatura" => [
                "numero" => "1035.00",
                "valor_original" => "224.50",
                "valor_desconto" => "0.00",
                "valor_liquido" => "224.50"
            ]
        ],
        "pagamento" => [
            "formas_pagamento" => [
                [
                    "meio_pagamento" => "01",
                    "valor" => "224.50"
                ]
            ]
        ],
        "informacoes_adicionais_contribuinte" => "PV: 3325 * Rep: DIRETO * Motorista:  * Forma Pagto: 04 DIAS * teste de observação para a nota fiscal * Valor aproximado tributos R$9,43 (4,20%) Fonte: IBPT",
        "pessoas_autorizadas" => [
            [
                "cnpj" => "96256273000170"
            ], [
                "cnpj" => "80681257000195"
            ]
        ]
    ];
    $resp = $nfe->cria($paylod); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Busca NFe

Busca pelos documentos armazenados em nossa base de dados

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

    $resp = $nfe->busca([
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

## Consulta NFe

Consulta uma NFe em nossa base de dados. Este método é normalmente usado logo após a NFe ter sido enviada para api.

```php
use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Nfe;

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

    $nfe = new Nfe($client);

    $resp = $nfe->consulta([
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

A carta de correção é usada para corrigir algum equivoco simples que tenha ocorrido na emissão da NFe, e que não tem impacto nos dados fiscais da mesma.

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
        'justificativa' => 'teste de correcao'
    ];
    $resp = $nfe->correcao($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

## Cancela NFe

Este método solicita o cancelamento da NFe à Sefaz autorizadora.

*NOTA: para poder cancelar uma NFe utilizando a API é necessário que o documento exista em nossa base de dados.*

**NOTA: Atenção para os prazos limite para realizar o cancelamento de NFe, de forma geral esse limite é de 24 horas a partir da data de emissão do documento. Após esse limite as NFe não poderão mais serem canceladas e para reverter a operação será necessário fazer uma NFe de entrada das mercadorias.**

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
        'chave' => '41210222545265000108550010001010021121093113',
        'justificativa' => 'teste de cancelamento' //minimo de 15 caracteres
    ];
    $resp = $nfe->cancela($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Inutiliza Faixa de Numeros de NFe

Sempre que por algum motivo tenham sido pulados numeros de NFe, esses numeros deve ser inulizados.

*NOTA: mesmo que deseje encerrar apenas um unico numero de NFe, nessa chamada deve ser passado o numero inicial e final IGUAIS.*

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
        'numero_inicial' => '101004',
        'numero_final' => '101004',
        'serie' => '1',
        'justificativa' => 'teste de inutilização'
    ];
    $resp = $nfe->inutiliza($payload); //os payloads são sempre ARRAYS

    echo "<pre>";
    print_r($resp); //imprime o objeto $resp em tela
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

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
