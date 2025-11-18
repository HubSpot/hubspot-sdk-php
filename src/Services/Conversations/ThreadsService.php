<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\PublicThread;
use HubspotSDK\Conversations\Threads\ThreadGetParams;
use HubspotSDK\Conversations\Threads\ThreadListParams;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\ThreadsContract;

final class ThreadsService implements ThreadsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Updates a single thread. Either a thread's status can be updated, or the thread can be restored.
     *
     * @param array{
     *   archived?: bool, status?: "OPEN"|"CLOSED"
     * }|ThreadUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $threadID,
        array|ThreadUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicThread {
        [$parsed, $options] = ThreadUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['conversations/v3/conversations/threads/%1$s', $threadID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicThread::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of threads, with optional filters and sorting.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associatedContactId?: int,
     *   association?: list<"TICKET">,
     *   inboxId?: list<int>,
     *   latestMessageTimestampAfter?: string|\DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   threadStatus?: string,
     * }|ThreadListParams $params
     *
     * @return Page<PublicThread>
     *
     * @throws APIException
     */
    public function list(
        array|ThreadListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ThreadListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/threads',
            query: $parsed,
            options: $options,
            convert: PublicThread::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Archives a single thread. The thread will be permanently deleted 30 days after placed in an archived state.
     *
     * @throws APIException
     */
    public function delete(
        int $threadID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['conversations/v3/conversations/threads/%1$s', $threadID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a single thread by its ID
     *
     * @param array{
     *   archived?: bool, association?: list<"TICKET">, property?: string
     * }|ThreadGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $threadID,
        array|ThreadGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicThread {
        [$parsed, $options] = ThreadGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/threads/%1$s', $threadID],
            query: $parsed,
            options: $options,
            convert: PublicThread::class,
        );
    }
}
