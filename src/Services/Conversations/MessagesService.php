<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\PublicAssignmentMessage;
use HubspotSDK\Conversations\PublicComment;
use HubspotSDK\Conversations\PublicMessageContent;
use HubspotSDK\Conversations\PublicThreadInboxChange;
use HubspotSDK\Conversations\PublicThreadStatusChange;
use HubspotSDK\Conversations\PublicWelcomeMessage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\MessagesContract;

final class MessagesService implements MessagesContract
{
    /**
     * @api
     */
    public MessagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        int $threadID,
        ?RequestOptions $requestOptions = null
    ): ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($threadID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'limit' => $limit,
                'property' => $property,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($threadID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange {
        $params = Util::removeNulls(
            ['threadID' => $threadID, 'property' => $property]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): PublicMessageContent {
        $params = Util::removeNulls(
            ['threadID' => $threadID, 'property' => $property]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getOriginalContent($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
