<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Scheduler\Meetings;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Scheduler\Meetings\Advanced\AdvancedBookParams;
use HubSpotSDK\Scheduler\Meetings\Advanced\AdvancedCreateParams;
use HubSpotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubSpotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
