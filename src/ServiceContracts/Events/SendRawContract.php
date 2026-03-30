<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Send\SendBatchSendParams;
use HubspotSDK\Events\Send\SendSendParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SendRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SendBatchSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function batchSend(
        array|SendBatchSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SendSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function send(
        array|SendSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
