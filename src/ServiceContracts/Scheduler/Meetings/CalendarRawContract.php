<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\Calendar\CalendarCreateParams;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;

interface CalendarRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CalendarCreateParams $params
     *
     * @return BaseResponse<ExternalCalenderMeetingEventResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CalendarCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
