<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\PublicThread;
use HubspotSDK\Conversations\Threads\ThreadGetParams;
use HubspotSDK\Conversations\Threads\ThreadListParams;
use HubspotSDK\Conversations\Threads\ThreadListParams\Association;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams\Status;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
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
     * @param array{
     *   archived?: bool, status?: 'CLOSED'|'OPEN'|Status
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

        /** @var BaseResponse<PublicThread> */
        $response = $this->client->request(
            method: 'patch',
            path: ['conversations/v3/conversations/threads/%1$s', $threadID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicThread::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associatedContactID?: int,
     *   association?: list<'TICKET'|Association>,
     *   inboxID?: list<int>,
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

        /** @var BaseResponse<Page<PublicThread>> */
        $response = $this->client->request(
            method: 'get',
            path: 'conversations/v3/conversations/threads',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'associatedContactID' => 'associatedContactId', 'inboxID' => 'inboxId',
                ],
            ),
            options: $options,
            convert: PublicThread::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $threadID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['conversations/v3/conversations/threads/%1$s', $threadID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @param array{
     *   archived?: bool,
     *   association?: list<'TICKET'|ThreadGetParams\Association>,
     *   property?: string,
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

        /** @var BaseResponse<PublicThread> */
        $response = $this->client->request(
            method: 'get',
            path: ['conversations/v3/conversations/threads/%1$s', $threadID],
            query: $parsed,
            options: $options,
            convert: PublicThread::class,
        );

        return $response->parse();
    }
}
