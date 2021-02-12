<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Nfe extends Base
{
    public function cria(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe", ['body' => $json]);
    }

    public function status(): stdClass
    {
        return $this->client->send('GET', '/nfe/status', []);
    }

    public function consulta(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/nfe/{$key}", []);
    }

    public function busca(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe/busca", ['body' => $json]);
    }

    public function cancela(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe/cancela", ['body' => $json]);
    }

    public function correcao(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe/correcao", ['body' => $json]);
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

    public function download(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/nfe/download/{$key}", []);
    }
}
