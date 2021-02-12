<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Nfce extends Base
{
    public function cria(array $payload): stdClass
    {
        return $this->client->send('POST', "/ncfe", $payload);
    }

    public function status(): stdClass
    {
        return $this->client->send('GET', '/ncfe/status', []);
    }

    public function consulta(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/ncfe/{$key}", []);
    }

    public function busca(array $payload): stdClass
    {
        return $this->client->send('POST', "/ncfe/busca", $payload);
    }

    public function cancela(array $payload): stdClass
    {
        return $this->client->send('POST', "/ncfe/cancela", $payload);
    }

    public function offline(): stdClass
    {
        return $this->client->send('GET', "/ncfe/offline", []);
    }

    public function inutiliza(array $payload): stdClass
    {
       return $this->client->send('POST', "/nfe/inutiliza", $payload);
    }

    public function pdf(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/nfe/pdf/{$key}", []);
    }

    public function substitui(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfe/substitui", $payload);
    }

    public function backup(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfe/backup", $payload);
    }
}
