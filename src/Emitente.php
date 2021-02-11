<?php

declare(strict_types=1);

namespace CloudDfe\Sdk;

use stdClass;

class Emitente extends Base
{
    public function token(): stdClass
    {
        return $this->client->send('GET', '/emitente/token', []);
    }

    public function atualiza(array $payload): stdClass
    {
        $json = json_encode($payload);
        return $this->client->send('PUT', "/emitente", ['body' => $json]);
    }
}
