<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Softhouse extends Base
{
    public function criaEmitente(array $payload): stdClass
    {
        return $this->client->send('POST', "/soft/emitente", $payload);
    }

    public function mostraEmitente(array $payload): stdClass
    {
        $cnpj = $payload['cnpj'];
        return $this->client->send('GET', "/soft/emitente/{$cnpj}", []);
    }

    public function atualizaEmitente(array $payload): stdClass
    {
        return $this->client->send('PUT', "/soft/emitente", $payload);
    }

    public function listaEmitentes(array $payload): stdClass
    {
        $status = !empty($payload['status']) ? $payload['status'] : '';
        $rota = '/soft/emitente';
        if ($status == 'deletados' || $status == 'inativos') {
            $rota = '/soft/emitente/deletados';
        }
        return $this->client->send('GET', $rota, []);
    }

    public function deletaEmitente(array $payload): stdClass
    {
        if (empty($payload) || empty($payload['cnpj'])) {
            throw new \Exception('Deve ser passado um CNPJ ou um CPF para efetuar a deleçao do emitente.');
        }
        $cnpj = $payload['cnpj'];
        return $this->client->send('DELETE', "/soft/emitente/{$cnpj}", []);
    }
}
