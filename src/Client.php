<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;
use GuzzleHttp\Client as GClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;


class Client
{
    protected $ambiente;
    protected $token;
    protected $options;
    protected $uri;

    public const AMBIENTE_PRODUCAO = 1;
    public const AMBIENTE_HOMOLOGACAO = 1;

    public function __construct($params = [])
    {
        $this->params = $params;
        if (empty($params)) {
            throw new \Exception("Devem ser passados os parametros básicos.");
        }
        if (!in_array($params['ambiente'], [self::AMBIENTE_PRODUCAO, self::AMBIENTE_HOMOLOGACAO])) {
            throw new \Exception("O ambiente de ser 1-produção ou 2-homologação.");
        }
        if (empty($params['token'])) {
            throw new \Exception("O token é obrigatorio.");
        }
        $this->ambiente = $params['ambiente'];
        $this->token = $params['token'];
        $this->options = $params['options'];
        $debug = $params['options']['debug'] == true ? true : false;

        //default homologacao
        $this->uri = 'http://localhost:8081';
        if ($this->ambiente == self::AMBIENTE_PRODUCAO) {
            $this->uri = 'http://localhost:8081';
        }
        $this->client = new GClient([
            'debug' => $debug,
            'base_uri' => $this->uri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => $this->token
            ],
        ]);
    }

    public function send(string $method, string $route, array $payload = []): stdClass
    {
        $response = $this->client->request($method, $route, $payload);
        return json_decode($response->getBody()->getContents());
    }
}
