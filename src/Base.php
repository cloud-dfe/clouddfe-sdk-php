<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

class Base
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
