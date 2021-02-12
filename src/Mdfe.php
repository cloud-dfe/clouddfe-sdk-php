<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Mdfe extends Base
{
    public function cria(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/mdfe", ['body' => $json]);
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
        $json = json_encode($payload);
        return $this->client->send('POST', "/mdfe/busca", ['body' => $json]);
    }

    public function cancela(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/mdfe/cancela", ['body' => $json]);
    }

    public function encerra(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/mdfe/encerra", ['body' => $json]);
    }

    public function condutor(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/mdfe/condutor", ['body' => $json]);
    }

    public function offline(): stdClass
    {
        return $this->client->send('GET', "/mdfe/offline", []);
    }

    public function pdf(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/nfe/pdf/{$key}", []);
    }

    public function manifesta(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe/manifesta", ['body' => $json]);
    }

    public function backup(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe/backup", ['body' => $json]);
    }
}
