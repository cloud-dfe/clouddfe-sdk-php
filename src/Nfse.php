<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Nfse extends Base
{
    public function cria(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfse", $payload);
    }

    public function consulta(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/nfse/{$key}", []);
    }

    public function cancela(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfse/cancela", $payload);
    }

    public function busca(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfse/busca", $payload);
    }

    public function backup(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfse/backup", $payload);
    }

    public function localiza(array $payload): stdClass
    {
        return $this->client->send('POST', "/nfse/consulta", $payload);
    }
}
