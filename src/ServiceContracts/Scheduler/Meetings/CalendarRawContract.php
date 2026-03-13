<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\Calendar\CalendarCreateParams;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CalendarRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CalendarCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalCalenderMeetingEventResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CalendarCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
