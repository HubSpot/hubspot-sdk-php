<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\PublicThread;
use HubspotSDK\Conversations\Threads\ThreadListParams\Association;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams\Status;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ThreadsContract
{
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
    ): PublicThread;

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
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $threadID,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): PublicThread;
}
