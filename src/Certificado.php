<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Certificado extends Base
{
    public function atualiza(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('POST', "/certificado", ['body' => $json]);
    }

    public function mostra(): stdClass
    {
        return $this->client->send('GET', '/certificado', []);
    }
}
