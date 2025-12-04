<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\Messages\MessageGetOriginalContentParams;
use HubspotSDK\Conversations\Messages\MessageGetParams;
use HubspotSDK\Conversations\Messages\MessageListParams;
use HubspotSDK\Conversations\PublicAssignmentMessage;
use HubspotSDK\Conversations\PublicComment;
use HubspotSDK\Conversations\PublicMessage;
use HubspotSDK\Conversations\PublicMessageContent;
use HubspotSDK\Conversations\PublicThreadInboxChange;
use HubspotSDK\Conversations\PublicThreadStatusChange;
use HubspotSDK\Conversations\PublicWelcomeMessage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\MessagesContract;

final class MessagesService implements MessagesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        int $threadID,
        ?RequestOptions $requestOptions = null
    ): ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conversations/v3/conversations/threads/%1$s/messages', $threadID],
            options: $requestOptions,
            convert: PublicMessage::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     * }|MessageListParams $params
     *
     * @return Page<ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange,>
     *
     * @throws APIException
     */
    public function list(
        int $threadID,
        array|MessageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = MessageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/threads/%1$s/messages', $threadID],
            query: $parsed,
            options: $options,
            convert: PublicMessage::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{threadId: int, property?: string}|MessageGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        array|MessageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange {
        [$parsed, $options] = MessageGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $threadID = $parsed['threadId'];
        unset($parsed['threadId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/conversations/threads/%1$s/messages/%2$s',
                $threadID,
                $messageID,
            ],
            query: $parsed,
            options: $options,
            convert: PublicMessage::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   threadId: int, property?: string
     * }|MessageGetOriginalContentParams $params
     *
     * @throws APIException
     */
    public function getOriginalContent(
        string $messageID,
        array|MessageGetOriginalContentParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicMessageContent {
        [$parsed, $options] = MessageGetOriginalContentParams::parseRequest(
            $params,
            $requestOptions,
        );
        $threadID = $parsed['threadId'];
        unset($parsed['threadId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/conversations/threads/%1$s/messages/%2$s/original-content',
                $threadID,
                $messageID,
            ],
            query: $parsed,
            options: $options,
            convert: PublicMessageContent::class,
        );
    }
}
