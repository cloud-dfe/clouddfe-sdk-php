# SDK em PHP para API CloudDFe

composer require cloud-dfe/clouddfe-sdk-php



```php

use CloudDfe\Sdk\Client;

try {
    $token = "token de softhouse sksksksksksksksksks";
    $ambiente = 1;
    $client = new Client($ambiente, $token);

    $soft = new Softhouse($client);
    $soft->criaEmitente($payload);
    $soft->mostraEmitente($payload);
    $soft->listaEmitente($payload);
    $soft->deletaEmitente($payload);
} catch (\Excepion $e) {
    echo $e->getMessage();
}





$token = "token de EMITENTE sksksksksksksksksks";
$ambiente = 1;
$options = [];
$client = new Client([
        $ambiente,
        $token,
        $options
]);

$emitente = new Emitente($client, $options = []);
$resp = $emitente->atualiza($payload);
$novo_token = $emitente->token();

$certificado = new Certificado($client);
$resp = $certificado->atualiza($payload);
$resp = $certificado->mostra();


$nfe = new Nfe($client);

$payload = [];
$resp = $nfe->status();
$resp = $nfe->cria($payload);
$resp = $nfe->consulta($payload);
$resp = $nfe->busca($payload);
$resp = $nfe->cancela($payload);
$resp = $nfe->correcao($payload);
$resp = $nfe->inutiliza($payload);
$resp = $nfe->pdf($payload);
$resp = $nfe->manifesta($payload);
$resp = $nfe->backup($payload);
$resp = $nfe->eventoTransporte($payload); //novo




$nfce = new Nfce($client);

$resp = $nfce->status();
$resp = $nfce->cria($payload);
$resp = $nfce->consulta($payload);
$resp = $nfce->busca($payload);
$resp = $nfce->cancela($payload);
$resp = $nfce->inutiliza($payload);
$resp = $nfce->pdfe($payload);
$resp = $nfce->offline();
$resp = $nfce->substitui($payload);
$resp = $nfce->backup($payload);


$mdfe = new Mdfe($client);

$resp = $mdfe->status();
$resp = $mdfe->cria($payload);
$resp = $mdfe->consulta($payload);
$resp = $mdfe->busca($payload);
$resp = $mdfe->cancela($payload);
$resp = $mdfe->condutor($payload);
$resp = $mdfe->encerra($payload);
$resp = $mdfe->pdf($payload);
$resp = $mdfe->offline();
$resp = $mdfe->backup($payload);


$cte = new Cte($client);

$resp = $cte->status();
$resp = $cte->cria($payload);
$resp = $cte->consulta($payload);
$resp = $cte->busca($payload);
$resp = $cte->cancela($payload);
$resp = $cte->correcao($payload);
$resp = $cte->inutiliza($payload);
$resp = $cte->pdf($payload);
$resp = $cte->backup($payload);


$cteos = new CteOS($client);

$resp = $cteos->status();
$resp = $cteos->cria($payload);
$resp = $cteos->consulta($payload);
$resp = $cteos->busca($payload);
$resp = $cteos->cancela($payload);
$resp = $cteos->correcao($payload);
$resp = $cteos->inutiliza($payload);
$resp = $cteos->pdf($payload);
$resp = $cteos->backup($payload);


$dfe = new Dfe($client);

$resp = $dfe->busca($tipo, $payload);
$resp = $dfe->backup($payload);





```
