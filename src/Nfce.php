<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Nfce extends Base
{
    public function cria(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/ncfe", ['body' => $json]);
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
        $json = json_encode($payload);
        return $this->client->send('POST', "/ncfe/busca", ['body' => $json]);
    }

    public function cancela(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/ncfe/cancela", ['body' => $json]);
    }

    public function offline(): stdClass
    {
        return $this->client->send('GET', "/ncfe/offline", []);
    }

    public function inutiliza(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe/inutiliza", ['body' => $json]);
    }

    public function pdf(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/nfe/pdf/{$key}", []);
    }

    public function substitui(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe/substitui", ['body' => $json]);
    }

    public function backup(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe/backup", ['body' => $json]);
    }
}
