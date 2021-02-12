<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Certificado extends Base
{
    public function atualiza(array $payload): stdClass
    {
        return $this->client->send('POST', "/certificado", $payload);
    }

    public function mostra(): stdClass
    {
        return $this->client->send('GET', '/certificado', []);
    }
}
