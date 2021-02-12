<?php

namespace CloudDfe\Sdk;

use stdClass;

class DFe extends Base
{
    public function buscaCte(array $payload): stdClass
    {
        return $this->client->send('POST', "/dfe/cte", $payload);
    }

    public function buscaNfe(array $payload): stdClass
    {
        return $this->client->send('POST', "/dfe/nfe", $payload);
    }

    public function backup(array $payload): stdClass
    {
        return $this->client->send('POST', "/dfe/backup", $payload);
    }
}
