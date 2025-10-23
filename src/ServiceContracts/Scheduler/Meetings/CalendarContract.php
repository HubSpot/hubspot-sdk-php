<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule;

interface CalendarContract
{
    /**
     * @api
     *
     * @param list<ExternalAssociationCreateRequest> $associations
     * @param ExternalEmailReminderSchedule $emailReminderSchedule
     * @param ExternalCalendarMeetingEventCreateProperties $properties
     * @param string $timezone
     *
     * @throws APIException
     */
    public function create(
        $associations,
        $emailReminderSchedule,
        $properties,
        $timezone,
        ?RequestOptions $requestOptions = null,
    ): ExternalCalenderMeetingEventResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalCalenderMeetingEventResponse;
}
