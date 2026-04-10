<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Events;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Events\Send\SendBatchSendParams;
use HubSpotSDK\Events\Send\SendSendParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
