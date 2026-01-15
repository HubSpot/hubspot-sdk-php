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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * @param int $threadID Path param
     * @param bool $archived Body param
     * @param Status|value-of<Status> $status Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $threadID,
        ?bool $archived = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicThread {
        $params = Util::removeNulls(['archived' => $archived, 'status' => $status]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($threadID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<Association|value-of<Association>> $association
     * @param list<int> $inboxID
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
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
        ?\DateTimeInterface $latestMessageTimestampAfter = null,
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
        ?string $threadStatus = null,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $threadID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($threadID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<\HubspotSDK\Conversations\Threads\ThreadGetParams\Association|value-of<\HubspotSDK\Conversations\Threads\ThreadGetParams\Association>> $association
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $threadID,
        ?bool $archived = null,
        ?array $association = null,
        ?string $property = null,
        RequestOptions|array|null $requestOptions = null,
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
