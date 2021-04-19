<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class CteOS extends Base
{
    public function cria(array $payload): stdClass
    {
        return $this->client->send('POST', "/cteos", $payload);
    }

    public function status(): stdClass
    {
        return $this->client->send('GET', '/cteos/status', []);
    }

    public function consulta(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/cteos/{$key}", []);
    }

    public function busca(array $payload): stdClass
    {
        return $this->client->send('POST', "/cteos/busca", $payload);
    }

    public function cancela(array $payload): stdClass
    {
        return $this->client->send('POST', "/cteos/cancela", $payload);
    }

    public function correcao(array $payload): stdClass
    {
        return $this->client->send('POST', "/cteos/correcao", $payload);
    }

    public function inutiliza(array $payload): stdClass
    {
        return $this->client->send('POST', "/cteos/inutiliza", $payload);
    }

    public function pdf(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/cteos/pdf/{$key}", []);
    }

    public function backup(array $payload): stdClass
    {
        return $this->client->send('POST', "/cteos/backup", $payload);
    }

    public function preview(array $payload): stdClass
    {
        return $this->client->send('POST', "/cteos/preview", $payload);
    }

    public function importa(array $payload): stdClass
    {
        return $this->client->send('POST', "/cteos/importa", $payload);
    }
}
