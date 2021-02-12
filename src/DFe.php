<?php

namespace CloudDfe\Sdk;

use stdClass;

class DFe extends Base
{
    public function buscaCte(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/dfe/cte", ['body' => $json]);
    }

    public function buscaNfe(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/dfe/nfe", ['body' => $json]);
    }

    public function backup(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/dfe/backup", ['body' => $json]);
    }
}
