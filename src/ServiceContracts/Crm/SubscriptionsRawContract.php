<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Subscriptions\SubscriptionPauseParams;
use HubspotSDK\Crm\Subscriptions\SubscriptionUnpauseParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SubscriptionsRawContract
{
    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function cancel(
        int $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     * @param array<string,mixed>|SubscriptionPauseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function pause(
        int $objectID,
        array|SubscriptionPauseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $objectID subscription CRM id
     * @param array<string,mixed>|SubscriptionUnpauseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function unpause(
        int $objectID,
        array|SubscriptionUnpauseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
