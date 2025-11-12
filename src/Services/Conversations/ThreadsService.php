<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CollectionResponsePublicThreadForwardPaging;
use HubspotSDK\Conversations\PublicThread;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
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
        string $threadID,
        array|ThreadUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicThread {
        [$parsed, $options] = ThreadUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['conversations/v3/conversations/threads/%1$s', $threadID],
            body: (object) $parsed,
            options: $options,
            convert: PublicThread::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of threads, with optional filters and sorting.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicThreadForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/threads',
            options: $requestOptions,
            convert: CollectionResponsePublicThreadForwardPaging::class,
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
        string $threadID,
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
     * @throws APIException
     */
    public function get(
        string $threadID,
        ?RequestOptions $requestOptions = null
    ): PublicThread {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/threads/%1$s', $threadID],
            options: $requestOptions,
            convert: PublicThread::class,
        );
    }
}
