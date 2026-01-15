<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\PublicThread;
use HubspotSDK\Conversations\Threads\ThreadListParams\Association;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams\Status;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ThreadsContract
{
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
    ): PublicThread;

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
    ): Page;

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
    ): mixed;

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
    ): PublicThread;
}
