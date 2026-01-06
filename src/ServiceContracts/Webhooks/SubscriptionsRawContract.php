<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks;

use HubspotSDK\Core\Contracts\BaseResponse;
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

interface SubscriptionsRawContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the app
     * @param array<mixed>|SubscriptionCreateParams $params
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|SubscriptionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID path param: The ID of the event subscription
     * @param array<mixed>|SubscriptionUpdateParams $params
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function update(
        int $subscriptionID,
        array|SubscriptionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the app
     *
     * @return BaseResponse<SubscriptionListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID the ID of the event subscription
     * @param array<mixed>|SubscriptionDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        array|SubscriptionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID the ID of the event subscription
     * @param array<mixed>|SubscriptionGetParams $params
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        array|SubscriptionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the app
     * @param array<mixed>|SubscriptionUpdateBatchParams $params
     *
     * @return BaseResponse<BatchResponseSubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateBatch(
        int $appID,
        array|SubscriptionUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
