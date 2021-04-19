<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Nfe extends Base
{
    public function cria(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfe", $payload);
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
        return $this->client->send('POST', "/nfe/busca", $payload);
    }

    public function cancela(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfe/cancela", $payload);
    }

    public function correcao(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfe/correcao", $payload);
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

    public function manifesta(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfe/manifesta", $payload);
    }

    public function backup(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfe/backup", $payload);
    }

    public function download(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/nfe/download/{$key}", []);
    }

    public function recebidas(array $payload): stdClass
    {
        return $this->client->send('GET', "/nfe/recebidas", $payload);
    }

    public function preview(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfe/preview", $payload);
    }

    public function importa(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfe/importa", $payload);
    }
}
