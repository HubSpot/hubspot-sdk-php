<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\Inboxes\InboxGetParams;
use HubspotSDK\Conversations\Inboxes\InboxListParams;
use HubspotSDK\Conversations\PublicInbox;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
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
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   defaultPageLength?: int,
     *   limit?: int,
     *   sort?: list<string>,
     * }|InboxListParams $params
     *
     * @return Page<PublicInbox>
     *
     * @throws APIException
     */
    public function list(
        array|InboxListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = InboxListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/inboxes',
            query: $parsed,
            options: $options,
            convert: PublicInbox::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a single conversations inbox using the inbox ID.
     *
     * @param array{archived?: bool}|InboxGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $inboxID,
        array|InboxGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicInbox {
        [$parsed, $options] = InboxGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/inboxes/%1$s', $inboxID],
            query: $parsed,
            options: $options,
            convert: PublicInbox::class,
        );
    }
}
