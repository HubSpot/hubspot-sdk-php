<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\WebhooksJournal\CollectionResponseSubscriptionResponseNoPaging;
use HubSpotSDK\WebhooksJournal\SubscriptionResponse;
use HubSpotSDK\WebhooksJournal\Subscriptions\SubscriptionCreateParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SubscriptionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SubscriptionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SubscriptionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseSubscriptionResponseNoPaging>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID The unique identifier of the subscription to delete. It must be provided as an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $portalID the unique identifier of the portal for which the webhook journal subscription is to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteForPortal(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID the unique identifier of the subscription to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
