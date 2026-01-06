<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Send\SendSendBatchParams;
use HubspotSDK\Events\Send\SendSendParams;
use HubspotSDK\RequestOptions;

interface SendRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|SendSendParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function send(
        array|SendSendParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|SendSendBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function sendBatch(
        array|SendSendBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
