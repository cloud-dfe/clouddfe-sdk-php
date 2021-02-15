<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Mdfe extends Base
{
    public function cria(array $payload): stdClass
    {
        return $this->client->send('POST', "/mdfe", $payload);
    }

    public function status(): stdClass
    {
        return $this->client->send('GET', '/mdfe/status', []);
    }

    public function consulta(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/mdfe/{$key}", []);
    }

    public function busca(array $payload): stdClass
    {
        return $this->client->send('POST', "/mdfe/busca", $payload);
    }

    public function cancela(array $payload): stdClass
    {
        return $this->client->send('POST', "/mdfe/cancela", $payload);
    }

    public function encerra(array $payload): stdClass
    {
        return $this->client->send('POST', "/mdfe/encerra", $payload);
    }

    public function condutor(array $payload): stdClass
    {
        return $this->client->send('POST', "/mdfe/condutor", $payload);
    }

    public function offline(): stdClass
    {
        return $this->client->send('GET', "/mdfe/offline", []);
    }

    public function pdf(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/mdfe/pdf/{$key}", []);
    }

    public function backup(array $payload): stdClass
    {
        return $this->client->send('POST', "/mdfe/backup", $payload);
    }

    public function nfe(array $payload): stdClass
    {
        return $this->client->send('POST', "/mdfe/nfe", $payload);
    }

    public function abertos(): stdClass
    {
        return $this->client->send('GET', "/mdfe/abertos", []);
    }
}
