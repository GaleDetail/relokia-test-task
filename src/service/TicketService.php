<?php

namespace Relokia\Service;

class TicketService extends BaseService
{
    public function fetchTickets(): array
    {
        $response = $this->client->get('tickets.json');
        $data = json_decode($response->getBody(), true);
        return $data['tickets'];
    }
}
