<?php
namespace Relokia\Service;

class CommentService extends BaseService
{
    public function fetchComments(int $ticketId): array
    {
        $response = $this->client->get("tickets/{$ticketId}/comments.json");
        $data = json_decode($response->getBody(), true);
        return $data['comments'];
    }
}
