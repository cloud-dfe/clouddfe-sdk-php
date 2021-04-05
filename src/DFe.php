<?php

namespace CloudDfe\Sdk;

use stdClass;

class DFe extends Base
{
    public function buscaCte(array $payload): stdClass
    {
        return $this->client->send('POST', "/dfe/cte", $payload);
    }

    public function downloadCte(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/dfe/cte/{$key}", []);
    }

    public function buscaNfe(array $payload): stdClass
    {
        return $this->client->send('POST', "/dfe/nfe", $payload);
    }

    public function downloadNfe(array $payload): stdClass
    {
        $key = self::checkKey($payload);
        return $this->client->send('GET', "/dfe/nfe/{$key}", []);
    }

    public function backup(array $payload): stdClass
    {
        return $this->client->send('POST', "/dfe/backup", $payload);
    }
}
