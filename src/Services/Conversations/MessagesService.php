<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CollectionResponsePublicMessageForwardPaging;
use HubspotSDK\Conversations\Messages\MessageGetOriginalContentParams;
use HubspotSDK\Conversations\Messages\MessageGetParams;
use HubspotSDK\Conversations\PublicAssignmentMessage;
use HubspotSDK\Conversations\PublicComment;
use HubspotSDK\Conversations\PublicConversationsMessage;
use HubspotSDK\Conversations\PublicMessage;
use HubspotSDK\Conversations\PublicMessageContent;
use HubspotSDK\Conversations\PublicThreadInboxChange;
use HubspotSDK\Conversations\PublicThreadStatusChange;
use HubspotSDK\Conversations\PublicWelcomeMessage;
use HubspotSDK\Core\Exceptions\APIException;
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
     * Send a new message on a thread at the current timestamp.
     *
     * @throws APIException
     */
    public function create(
        string $threadID,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange {
        // @phpstan-ignore-next-line;
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
     * Retrieve the message history for a specific thread.
     *
     * @throws APIException
     */
    public function list(
        string $threadID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicMessageForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/threads/%1$s/messages', $threadID],
            options: $requestOptions,
            convert: CollectionResponsePublicMessageForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a single message from a thread using the message ID.
     *
     * @param string $threadID
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        $threadID,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange {
        $params = ['threadID' => $threadID];

        return $this->getRaw($messageID, $params, $requestOptions);
    }

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
    ): PublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange {
        [$parsed, $options] = MessageGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $threadID = $parsed['threadID'];
        unset($parsed['threadID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/conversations/threads/%1$s/messages/%2$s',
                $threadID,
                $messageID,
            ],
            options: $options,
            convert: PublicMessage::class,
        );
    }

    /**
     * @api
     *
     * Returns the complete original text and rich text bodies of a message. This will be different from the text and rich text in the message itself if the message's `truncationStatus` is anything other than `NOT_TRUNCATED`.
     *
     * @param string $threadID
     *
     * @throws APIException
     */
    public function getOriginalContent(
        string $messageID,
        $threadID,
        ?RequestOptions $requestOptions = null
    ): PublicMessageContent {
        $params = ['threadID' => $threadID];

        return $this->getOriginalContentRaw($messageID, $params, $requestOptions);
    }

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
    ): PublicMessageContent {
        [$parsed, $options] = MessageGetOriginalContentParams::parseRequest(
            $params,
            $requestOptions
        );
        $threadID = $parsed['threadID'];
        unset($parsed['threadID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/conversations/threads/%1$s/messages/%2$s/original-content',
                $threadID,
                $messageID,
            ],
            options: $options,
            convert: PublicMessageContent::class,
        );
    }
}
