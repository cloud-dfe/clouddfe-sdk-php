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

    protected static function checkKey(array $payload): string
    {
        $key = preg_replace("/[^0-9]/", "", $payload['chave']);
        if (empty($key) || strlen($key) != 44) {
            throw new \Exception('A chave para gerar o PDF deve ter 44 digitos numericos');
        }
        return $key;
    }
}
