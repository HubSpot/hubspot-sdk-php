<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatusesResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionDefinitionsResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams;
use HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams;
use HubspotSDK\RequestOptions;

interface SubscriptionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): SubscriptionDefinitionsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getEmailStatus(
        string $emailAddress,
        ?RequestOptions $requestOptions = null
    ): PublicSubscriptionStatusesResponse;

    /**
     * @api
     *
     * @param array<mixed>|SubscriptionSubscribeParams $params
     *
     * @throws APIException
     */
    public function subscribe(
        array|SubscriptionSubscribeParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSubscriptionStatus;

    /**
     * @api
     *
     * @param array<mixed>|SubscriptionUnsubscribeParams $params
     *
     * @throws APIException
     */
    public function unsubscribe(
        array|SubscriptionUnsubscribeParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSubscriptionStatus;
}
