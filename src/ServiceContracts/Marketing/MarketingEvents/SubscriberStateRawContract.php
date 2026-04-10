<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\MarketingEvents\SubscriberState\SubscriberStateRecordByEmailParams;
use HubSpotSDK\Marketing\MarketingEvents\SubscriberState\SubscriberStateRecordByIDParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SubscriberStateRawContract
{
    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param array<string,mixed>|SubscriberStateRecordByEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function recordByEmail(
        string $subscriberState,
        array|SubscriberStateRecordByEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param array<string,mixed>|SubscriberStateRecordByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function recordByID(
        string $subscriberState,
        array|SubscriberStateRecordByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
