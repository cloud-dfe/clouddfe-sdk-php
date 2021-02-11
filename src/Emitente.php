<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use CloudDfe\Sdk\Client;

class Emitente
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;

    }

    public function token()
    {
        return $this->client->send('GET', '/emitente/token', []);
    }
}
