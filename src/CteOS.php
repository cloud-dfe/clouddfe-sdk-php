<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class CteOS extends Base
{
    public function cria(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/cteos", ['body' => $json]);
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
        $json = json_encode($payload);
        return $this->client->send('POST', "/cteos/busca", ['body' => $json]);
    }

    public function cancela(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/cteos/cancela", ['body' => $json]);
    }

    public function correcao(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/cteos/correcao", ['body' => $json]);
    }

    public function inutiliza(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/cteos/inutiliza", ['body' => $json]);
    }

    public function pdf(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/cteos/pdf/{$key}", []);
    }

    public function backup(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/cte/backup", ['body' => $json]);
    }
}
