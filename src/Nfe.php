<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;
use CloudDfe\Sdk\Client;

class Nfe
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function status(): stdClass
    {
        return $this->client->send('GET', '/nfe/status', []);
    }

    public function consulta($payload): stdClass
    {
        $key = preg_replace("/[^0-9]/", "",$payload['chave']);
        if (empty($key) || strlen($key) != 44) {
            throw new \Exception('A chave para uma busca deve ter 44 digitos numericos');
        }
        return $this->client->send('GET', "/nfe/{$key}", []);
    }

    public function pdf($payload): stdClass
    {
        $key = preg_replace("/[^0-9]/", "",$payload['chave']);
        if (empty($key) || strlen($key) != 44) {
            throw new \Exception('A chave para gerar o PDF deve ter 44 digitos numericos');
        }
        return $this->client->send('GET', "/nfe/pdf/{$key}", []);
    }

    public function busca($payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/nfe/busca", ['body' => $json]);
    }
}
