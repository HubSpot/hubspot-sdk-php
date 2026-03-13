<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule;

/**
 * @phpstan-import-type ExternalAssociationCreateRequestShape from \HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest
 * @phpstan-import-type ExternalEmailReminderScheduleShape from \HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule
 * @phpstan-import-type ExternalCalendarMeetingEventCreatePropertiesShape from \HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CalendarContract
{
    /**
     * @api
     *
     * @param string $organizerUserID Query param
     * @param list<ExternalAssociationCreateRequest|ExternalAssociationCreateRequestShape> $associations Body param
     * @param ExternalEmailReminderSchedule|ExternalEmailReminderScheduleShape $emailReminderSchedule Body param
     * @param ExternalCalendarMeetingEventCreateProperties|ExternalCalendarMeetingEventCreatePropertiesShape $properties Body param
     * @param string $timezone Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $organizerUserID,
        array $associations,
        ExternalEmailReminderSchedule|array $emailReminderSchedule,
        ExternalCalendarMeetingEventCreateProperties|array $properties,
        string $timezone,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalCalenderMeetingEventResponse;
}
