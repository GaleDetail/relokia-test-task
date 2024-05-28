<?php

namespace Relokia\Service;

class UserService extends BaseService
{
    public function fetchUser(int $userId): array
    {
        $response = $this->client->get("users/{$userId}.json");
        $data = json_decode($response->getBody(), true);
        return $data['user'];
    }
}
