<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Softhouse extends Base
{
    public function criaEmitente(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/soft/emitente", ['body' => $json]);
    }

    public function mostraEmitente($payload): stdClass
    {
        $cnpj = $payload['cnpj'];
        return $this->client->send('GET', "/soft/emitente/{$cnpj}", []);
    }

    public function listaEmitentes(array $payload): stdClass
    {
        $status = $payload['status'];
        $rota = '/soft/emitente';
        if ($status == 'deletados' || $status == 'inativos') {
            $rota = '/soft/emitente/deletados';
        }
        return $this->client->send('GET', $rota, []);
    }

    public function deletaEmitente($payload): stdClass
    {
        $cnpj = $payload['cnpj'];
        return $this->client->send('DELETE', "/soft/emitente/{$cnpj}", []);
    }

}
