<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\PublicThread;
use HubspotSDK\Conversations\Threads\ThreadListParams\Association;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams\Status;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\ThreadsContract;

final class ThreadsService implements ThreadsContract
{
    /**
     * @api
     */
    public ThreadsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ThreadsRawService($client);
    }

    /**
     * @api
     *
     * @param int $threadID Path param:
     * @param bool $archived Body param:
     * @param 'CLOSED'|'OPEN'|Status $status Body param:
     *
     * @throws APIException
     */
    public function update(
        int $threadID,
        ?bool $archived = null,
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): PublicThread {
        $params = Util::removeNulls(['archived' => $archived, 'status' => $status]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($threadID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<'TICKET'|Association> $association
     * @param list<int> $inboxID
     * @param list<string> $sort
     *
     * @return Page<PublicThread>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?int $associatedContactID = null,
        ?array $association = null,
        ?array $inboxID = null,
        string|\DateTimeInterface|null $latestMessageTimestampAfter = null,
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
        ?string $threadStatus = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'associatedContactID' => $associatedContactID,
                'association' => $association,
                'inboxID' => $inboxID,
                'latestMessageTimestampAfter' => $latestMessageTimestampAfter,
                'limit' => $limit,
                'property' => $property,
                'sort' => $sort,
                'threadStatus' => $threadStatus,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($threadID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<'TICKET'|\HubspotSDK\Conversations\Threads\ThreadGetParams\Association> $association
     *
     * @throws APIException
     */
    public function get(
        int $threadID,
        ?bool $archived = null,
        ?array $association = null,
        ?string $property = null,
        ?RequestOptions $requestOptions = null,
    ): PublicThread {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'association' => $association,
                'property' => $property,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($threadID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
