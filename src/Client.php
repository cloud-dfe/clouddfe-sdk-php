<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use GuzzleHttp\Client as Guzzle;
use stdClass;

class Client
{
    protected $ambiente;
    protected $token;
    protected $options;
    protected $uri;
    protected $params;
    protected $client;

    const AMBIENTE_PRODUCAO = 1;
    const AMBIENTE_HOMOLOGACAO = 2;

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
        $debug = false;
        if (!empty($params['options'])) {
            $debug = $params['options']['debug'] == true ? true : false;
        }
        //default homologacao
        $this->uri = 'https://hom.api.cloud-dfe.com.br/v1';
        if ($this->ambiente == self::AMBIENTE_PRODUCAO) {
            $this->uri = 'https://api.cloud-dfe.com.br/v1';
        }
        $this->client = new Guzzle([
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
        if (!empty($payload)) {
            $json = json_encode($payload);
            $payload = ['body' => $json];
        }
        $response = $this->client->request($method, $route, $payload);
        $body = $response->getBody()->getContents();
        return json_decode($body);
    }
}
