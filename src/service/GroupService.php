<?php

namespace Relokia\Service;

class GroupService extends BaseService
{
    public function fetchGroup(int $groupId): array
    {
        $response = $this->client->get("groups/{$groupId}.json");
        $data = json_decode($response->getBody(), true);
        return $data['group'];
    }
}
