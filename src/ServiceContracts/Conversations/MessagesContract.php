<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\PublicAssignmentMessage;
use HubspotSDK\Conversations\PublicComment;
use HubspotSDK\Conversations\PublicMessageContent;
use HubspotSDK\Conversations\PublicThreadInboxChange;
use HubspotSDK\Conversations\PublicThreadStatusChange;
use HubspotSDK\Conversations\PublicWelcomeMessage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface MessagesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        int $threadID,
        ?RequestOptions $requestOptions = null
    ): ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange;

    /**
     * @api
     *
     * @param list<string> $sort
     *
     * @return Page<ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange,>
     *
     * @throws APIException
     */
    public function list(
        int $threadID,
        ?string $after = null,
        ?bool $archived = null,
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $messageID Path param:
     * @param int $threadID Path param:
     * @param string $property Query param:
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        int $threadID,
        ?string $property = null,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange;

    /**
     * @api
     *
     * @param string $messageID Path param:
     * @param int $threadID Path param:
     * @param string $property Query param:
     *
     * @throws APIException
     */
    public function getOriginalContent(
        string $messageID,
        int $threadID,
        ?string $property = null,
        ?RequestOptions $requestOptions = null,
    ): PublicMessageContent;
}
