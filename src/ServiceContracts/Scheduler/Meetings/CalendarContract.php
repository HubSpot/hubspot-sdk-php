<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\Calendar\CalendarCreateParams;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;

interface CalendarContract
{
    /**
     * @api
     *
     * @param array<mixed>|CalendarCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CalendarCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ExternalCalenderMeetingEventResponse;
}
