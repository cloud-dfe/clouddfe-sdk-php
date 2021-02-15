# SDK em PHP para API CloudDFe

Este SDK em PHP tem por objetivo simplificar a tarefa de intalação e preparação do seu sistema para uso da nossa API, removendo parte da complexidade subjacente ao uso da mesma.


[![Latest Version on Packagist][ico-version]][link-packagist]


## Forma de instalação do SDK

```
composer require cloud-dfe/clouddfe-sdk-php
```

## Forma de uso

Uma vez instalado o SDK é uma tarefa muito simples invocar o seu uso, por exemplo:

```php

use CloudDfe\Sdk\Client;
use CloudDfe\Sdk\Nfe;

try {

    //token de emitente, todas as rotas relativas a tarefas realizadas pelos emitentes devem usar o token exclusivo desse emitente
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbXAiOjcwLCJ1c3IiOiIyIiwidHAiO .......';
    //selecione o ambente que deseja acessar HOMOLOGAÇÂO ou PRODUÇÃO
    $ambiente = Client::AMBIENTE_HOMOLOGACAO;
    // as opções, são opcionais e permitem ajustes no comportamento do SDK
    $options = [
        'debug' => false
    ];
    //instancie a classe Client, responsável pela comunicação com a API
    $client = new Client([
        'ambiente' => $ambiente,
        'token' => $token,
        'options' => $options
    ]);
    //instancie a classe das operações desejadas
    $nfe = new Nfe($client);
    //realize a operação desejada
    $resp = $nfe->status();
    //$resp irá conter um OBJETO stdClass com o retorno da API
    echo "<pre>";
    print_r($resp);
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

Para saber os detalhes referentes ao dados de envio e os retornos consulte nossa documentação [CloudDocs](https://doc.cloud-dfe.com.br/).
E veja alguns detalhes na pasta dos [EXEMPLOS](https://github.com/cloud-dfe/clouddfe-sdk-php/tree/master/examples).


[Operações da SOFTHOUSE](SOFTHOUSE.md)

[Operações com cadastro do EMITENTE](EMITENTE.md)

[Operações com os CERTIFICADOS](CERTIFICADO.md)

[Operações com NFE](NFE.md)

[Operações com NFCE](NFCE.md)

[Operações com NFSE](NFSE.md)

[Operações com CTE](CTE.md)

[Operações com CTEOS](CTEOS.md)

[Operações com MDFE](MDFE.md)

[Operações com DFE](DFE.md)


[ico-version]: https://img.shields.io/packagist/v/cloud-dfe/cloud-dfe-sdk-php.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/cloud-dfe/cloud-dfe-sdk-php
