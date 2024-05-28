<?php
require 'vendor/autoload.php';

use Relokia\API\ZendeskAPI;
use Relokia\Service\TicketService;
use Relokia\Service\UserService;
use Relokia\Service\GroupService;
use Relokia\Service\CompanyService;
use Relokia\Service\CommentService;
use Relokia\Utils\CsvWriter;

$config = require 'config/config.php';

$zendeskAPI = new ZendeskAPI($config['zendesk']);
$ticketService = new TicketService($zendeskAPI);
$userService = new UserService($zendeskAPI);
$groupService = new GroupService($zendeskAPI);
$companyService = new CompanyService($zendeskAPI);
$commentService = new CommentService($zendeskAPI);

$tickets = $ticketService->fetchTickets();

$csvWriter = new CsvWriter($config['csv']['path']);
$csvWriter->writeHeader([
    'Ticket ID', 'Description', 'Status', 'Priority', 'Agent ID', 'Agent Name', 'Agent Email',
    'Contact ID', 'Contact Name', 'Contact Email', 'Group ID', 'Group Name', 'Company ID',
    'Company Name', 'Comments'
]);

foreach ($tickets as $ticket) {
    $agent = $userService->fetchUser($ticket['assignee_id']);
    $contact = $userService->fetchUser($ticket['requester_id']);
    $group = $groupService->fetchGroup($ticket['group_id']);
    $companyName = '';

    if (!empty($ticket['organization_id'])) {
        $company = $companyService->fetchCompany($ticket['organization_id']);
        $companyName = $company['name'];
    }

    $comments = $commentService->fetchComments($ticket['id']);
    $commentTexts = implode('; ', array_column($comments, 'body'));

    $csvWriter->writeRow([
        $ticket['id'], $ticket['description'], $ticket['status'], $ticket['priority'],
        $ticket['assignee_id'], $agent['name'], $agent['email'],
        $ticket['requester_id'], $contact['name'], $contact['email'],
        $ticket['group_id'], $group['name'], $ticket['organization_id'] ?? '', $companyName,
        $commentTexts
    ]);
}

