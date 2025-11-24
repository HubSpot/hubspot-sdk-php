<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Subscriptions\SubscriptionPauseParams;
use HubspotSDK\Crm\Subscriptions\SubscriptionUnpauseParams;
use HubspotSDK\RequestOptions;

interface SubscriptionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function cancel(
        int $objectID,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param array<mixed>|SubscriptionPauseParams $params
     *
     * @throws APIException
     */
    public function pause(
        int $objectID,
        array|SubscriptionPauseParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<mixed>|SubscriptionUnpauseParams $params
     *
     * @throws APIException
     */
    public function unpause(
        int $objectID,
        array|SubscriptionUnpauseParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;
}
