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
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\MessagesRawContract;

final class MessagesRawService implements MessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
    ): BaseResponse {
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
     * @return BaseResponse<Page<ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange,>,>
     *
     * @throws APIException
     */
    public function list(
        int $threadID,
        array|MessageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
     * @param string $messageID Path param:
     * @param array{threadID: int, property?: string}|MessageGetParams $params
     *
     * @return BaseResponse<ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange,>
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        array|MessageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $threadID = $parsed['threadID'];
        unset($parsed['threadID']);

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
     * @param string $messageID Path param:
     * @param array{
     *   threadID: int, property?: string
     * }|MessageGetOriginalContentParams $params
     *
     * @return BaseResponse<PublicMessageContent>
     *
     * @throws APIException
     */
    public function getOriginalContent(
        string $messageID,
        array|MessageGetOriginalContentParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageGetOriginalContentParams::parseRequest(
            $params,
            $requestOptions,
        );
        $threadID = $parsed['threadID'];
        unset($parsed['threadID']);

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
