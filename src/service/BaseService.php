<?php

namespace Relokia\Service;

use Relokia\API\ZendeskAPI;

abstract class BaseService
{
    protected $client;

    public function __construct(ZendeskAPI $api)
    {
        $this->client = $api->getClient();
    }
}
