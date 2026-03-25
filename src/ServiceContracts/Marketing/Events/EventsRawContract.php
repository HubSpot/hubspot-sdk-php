<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\Events\EventCancelByExternalEventIDParams;
use HubspotSDK\Marketing\Events\Events\EventCompleteByExternalEventIDParams;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface EventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EventCancelByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        array|EventCancelByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID Path param
     * @param array<string,mixed>|EventCompleteByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function completeByExternalEventID(
        string $externalEventID,
        array|EventCompleteByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
