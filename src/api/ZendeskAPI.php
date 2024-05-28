<?php

namespace Relokia\API;

use GuzzleHttp\Client;

class ZendeskAPI
{
    private $client;
    private $subdomain;
    private $username;
    private $token;

    public function __construct(array $config)
    {
        $this->subdomain = $config['subdomain'];
        $this->username = $config['username'];
        $this->token = $config['token'];
        $this->client = new Client([
            'base_uri' => "https://{$this->subdomain}.zendesk.com/api/v2/",
            'auth' => [$this->username . '/token', $this->token],
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);
    }

    public function getClient(): Client
    {
        return $this->client;
    }
}
