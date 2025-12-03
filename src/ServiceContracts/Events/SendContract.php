<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Send\SendSendBatchParams;
use HubspotSDK\Events\Send\SendSendParams;
use HubspotSDK\RequestOptions;

interface SendContract
{
    /**
     * @api
     *
     * @param array<mixed>|SendSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|SendSendParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SendSendBatchParams $params
     *
     * @throws APIException
     */
    public function sendBatch(
        array|SendSendBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
