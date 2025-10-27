<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CollectionResponsePublicMessageForwardPaging;
use HubspotSDK\Conversations\PublicAssignmentMessage;
use HubspotSDK\Conversations\PublicComment;
use HubspotSDK\Conversations\PublicConversationsMessage;
use HubspotSDK\Conversations\PublicMessageContent;
use HubspotSDK\Conversations\PublicThreadInboxChange;
use HubspotSDK\Conversations\PublicThreadStatusChange;
use HubspotSDK\Conversations\PublicWelcomeMessage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface MessagesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        string $threadID,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $threadID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicMessageForwardPaging;

    /**
     * @api
     *
     * @param string $threadID
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        $threadID,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $messageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange;

    /**
     * @api
     *
     * @param string $threadID
     *
     * @throws APIException
     */
    public function getOriginalContent(
        string $messageID,
        $threadID,
        ?RequestOptions $requestOptions = null
    ): PublicMessageContent;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getOriginalContentRaw(
        string $messageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicMessageContent;
}
