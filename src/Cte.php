<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Cte extends Base
{
    public function cria(array $payload): stdClass
    {
        return $this->client->send('POST', "/cte", $payload);
    }

    public function status(): stdClass
    {
        return $this->client->send('GET', '/cte/status', []);
    }

    public function consulta(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/cte/{$key}", []);
    }

    public function busca(array $payload): stdClass
    {
        return $this->client->send('POST', "/cte/busca", $payload);
    }

    public function cancela(array $payload): stdClass
    {
        return $this->client->send('POST', "/cte/cancela", $payload);
    }

    public function correcao(array $payload): stdClass
    {
        return $this->client->send('POST', "/cte/correcao", $payload);
    }

    public function inutiliza(array $payload): stdClass
    {
        return $this->client->send('POST', "/cte/inutiliza", $payload);
    }

    public function pdf(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/cte/pdf/{$key}", []);
    }

    public function backup(array $payload): stdClass
    {
        return $this->client->send('POST', "/cte/backup", $payload);
    }

    public function preview(array $payload): stdClass
    {
        return $this->client->send('POST', "/cte/preview", $payload);
    }
}
