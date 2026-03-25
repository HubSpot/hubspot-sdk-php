<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\Advanced\AdvancedBookParams;
use HubspotSDK\Scheduler\Meetings\Advanced\AdvancedCreateParams;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AdvancedRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AdvancedCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalCalenderMeetingEventResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AdvancedCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AdvancedBookParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalMeetingBookingResponse>
     *
     * @throws APIException
     */
    public function book(
        array|AdvancedBookParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
