<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CollectionResponsePublicThreadForwardPaging;
use HubspotSDK\Conversations\PublicThread;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams\Status;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface ThreadsContract
{
    /**
     * @api
     *
     * @param bool $archived Whether this thread is archived. Set to false to restore the thread.
     * @param Status|value-of<Status> $status the thread's status: `OPEN` or `CLOSED`
     *
     * @throws APIException
     */
    public function update(
        string $threadID,
        $archived = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicThread;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $threadID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicThread;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicThreadForwardPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $threadID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $threadID,
        ?RequestOptions $requestOptions = null
    ): PublicThread;
}
