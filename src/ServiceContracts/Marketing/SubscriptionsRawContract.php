<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatusesResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionDefinitionsResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams;
use HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SubscriptionsRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionDefinitionsResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSubscriptionStatusesResponse>
     *
     * @throws APIException
     */
    public function getEmailStatus(
        string $emailAddress,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SubscriptionSubscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSubscriptionStatus>
     *
     * @throws APIException
     */
    public function subscribe(
        array|SubscriptionSubscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SubscriptionUnsubscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSubscriptionStatus>
     *
     * @throws APIException
     */
    public function unsubscribe(
        array|SubscriptionUnsubscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
