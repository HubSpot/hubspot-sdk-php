<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CollectionResponsePublicThreadForwardPaging;
use HubspotSDK\Conversations\PublicThread;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface ThreadsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ThreadUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $threadID,
        array|ThreadUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
