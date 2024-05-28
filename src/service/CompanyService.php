<?php
namespace Relokia\Service;

class CompanyService extends BaseService
{
    public function fetchCompany(int $companyId): array
    {
        $response = $this->client->get("organizations/{$companyId}.json");
        $data = json_decode($response->getBody(), true);
        return $data['organization'];
    }
}
