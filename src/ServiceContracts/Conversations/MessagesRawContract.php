<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\Messages\MessageGetOriginalContentParams;
use HubspotSDK\Conversations\Messages\MessageGetParams;
use HubspotSDK\Conversations\Messages\MessageListParams;
use HubspotSDK\Conversations\PublicAssignmentMessage;
use HubspotSDK\Conversations\PublicComment;
use HubspotSDK\Conversations\PublicMessageContent;
use HubspotSDK\Conversations\PublicThreadInboxChange;
use HubspotSDK\Conversations\PublicThreadStatusChange;
use HubspotSDK\Conversations\PublicWelcomeMessage;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface MessagesRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange,>
     *
     * @throws APIException
     */
    public function create(
        int $threadID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessageListParams $params
     *
     * @return BaseResponse<Page<ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange,>,>
     *
     * @throws APIException
     */
    public function list(
        int $threadID,
        array|MessageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID Path param:
     * @param array<mixed>|MessageGetParams $params
     *
     * @return BaseResponse<ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange,>
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        array|MessageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID Path param:
     * @param array<mixed>|MessageGetOriginalContentParams $params
     *
     * @return BaseResponse<PublicMessageContent>
     *
     * @throws APIException
     */
    public function getOriginalContent(
        string $messageID,
        array|MessageGetOriginalContentParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
