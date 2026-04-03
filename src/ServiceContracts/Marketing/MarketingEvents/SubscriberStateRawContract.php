<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\SubscriberState\SubscriberStateRecordByEmailParams;
use HubspotSDK\Marketing\MarketingEvents\SubscriberState\SubscriberStateRecordByIDParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
