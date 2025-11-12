<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\SubscriptionListResponse;
use HubspotSDK\Webhooks\SubscriptionResponse;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionCreateParams;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionDeleteParams;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionGetParams;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionUpdateBatchParams;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionUpdateParams;

interface SubscriptionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|SubscriptionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|SubscriptionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param array<mixed>|SubscriptionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $subscriptionID,
        array|SubscriptionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SubscriptionListResponse;

    /**
     * @api
     *
     * @param array<mixed>|SubscriptionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        array|SubscriptionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SubscriptionGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        array|SubscriptionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param array<mixed>|SubscriptionUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        int $appID,
        array|SubscriptionUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriptionResponse;
}
