<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\PublicThread;
use HubspotSDK\Conversations\Threads\ThreadGetParams;
use HubspotSDK\Conversations\Threads\ThreadListParams;
use HubspotSDK\Conversations\Threads\ThreadUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ThreadsRawContract
{
    /**
     * @api
     *
     * @param int $threadID Path param:
     * @param array<mixed>|ThreadUpdateParams $params
     *
     * @return BaseResponse<PublicThread>
     *
     * @throws APIException
     */
    public function update(
        int $threadID,
        array|ThreadUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ThreadListParams $params
     *
     * @return BaseResponse<Page<PublicThread>>
     *
     * @throws APIException
     */
    public function list(
        array|ThreadListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $threadID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ThreadGetParams $params
     *
     * @return BaseResponse<PublicThread>
     *
     * @throws APIException
     */
    public function get(
        int $threadID,
        array|ThreadGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
