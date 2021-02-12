<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Nfse extends Base
{
    public function cria(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfse", ['body' => $json]);
    }

    public function consulta(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/nfse/{$key}", []);
    }

    public function cancela(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfse/cancela", ['body' => $json]);
    }

    public function busca(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfse/busca", ['body' => $json]);
    }

    public function backup(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfse/backup", ['body' => $json]);
    }

    public function localiza(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfse/consulta", ['body' => $json]);
    }
}
