<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Subscriptions\SubscriptionPauseParams;
use HubspotSDK\Crm\Subscriptions\SubscriptionUnpauseParams;
use HubspotSDK\RequestOptions;

interface SubscriptionsRawContract
{
    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function cancel(
        int $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     * @param array<string,mixed>|SubscriptionPauseParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function pause(
        int $objectID,
        array|SubscriptionPauseParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     * @param array<string,mixed>|SubscriptionUnpauseParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function unpause(
        int $objectID,
        array|SubscriptionUnpauseParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
