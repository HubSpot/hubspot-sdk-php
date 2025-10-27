<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CollectionResponseWithTotalPublicInboxForwardPaging;
use HubspotSDK\Conversations\PublicInbox;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\InboxesContract;

final class InboxesService implements InboxesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of conversations inboxes, with optional filters and sorting.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicInboxForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/inboxes',
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicInboxForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a single conversations inbox using the inbox ID.
     *
     * @throws APIException
     */
    public function get(
        string $inboxID,
        ?RequestOptions $requestOptions = null
    ): PublicInbox {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/inboxes/%1$s', $inboxID],
            options: $requestOptions,
            convert: PublicInbox::class,
        );
    }
}
