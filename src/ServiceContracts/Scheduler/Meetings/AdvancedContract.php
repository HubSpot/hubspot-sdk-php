<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Scheduler\Meetings;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest;
use HubSpotSDK\Scheduler\Meetings\ExternalBookingFormField;
use HubSpotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;
use HubSpotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubSpotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule;
use HubSpotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;
use HubSpotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;

/**
 * @phpstan-import-type ExternalAssociationCreateRequestShape from \HubSpotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest
 * @phpstan-import-type ExternalEmailReminderScheduleShape from \HubSpotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule
 * @phpstan-import-type ExternalCalendarMeetingEventCreatePropertiesShape from \HubSpotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties
 * @phpstan-import-type ExternalBookingFormFieldShape from \HubSpotSDK\Scheduler\Meetings\ExternalBookingFormField
 * @phpstan-import-type ExternalLegalConsentResponseShape from \HubSpotSDK\Scheduler\Meetings\ExternalLegalConsentResponse
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface AdvancedContract
{
    /**
     * @api
     *
     * @param string $organizerUserID Query param
     * @param list<ExternalAssociationCreateRequest|ExternalAssociationCreateRequestShape> $associations Body param
     * @param ExternalEmailReminderSchedule|ExternalEmailReminderScheduleShape $emailReminderSchedule Body param
     * @param ExternalCalendarMeetingEventCreateProperties|ExternalCalendarMeetingEventCreatePropertiesShape $properties Body param
     * @param string $timezone body param: The timezone property that will be set on the meeting event
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

    /**
     * @api
     *
     * @param int $duration the duration of the meeting in milliseconds
     * @param string $email the email address of the person booking the meeting
     * @param string $firstName the first name of the person booking the meeting
     * @param list<ExternalBookingFormField|ExternalBookingFormFieldShape> $formFields
     * @param string $lastName the last name of the person booking the meeting
     * @param list<ExternalLegalConsentResponse|ExternalLegalConsentResponseShape> $legalConsentResponses
     * @param list<string> $likelyAvailableUserIDs
     * @param string $slug the unique path identifier for the meeting page
     * @param \DateTimeInterface $startTime the date and time when the meeting is scheduled to start, in ISO 8601 format
     * @param string $locale the locale used for formatting dates and times in the meeting booking
     * @param string $timezone the timezone in which the meeting is scheduled
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function book(
        int $duration,
        string $email,
        string $firstName,
        array $formFields,
        string $lastName,
        array $legalConsentResponses,
        array $likelyAvailableUserIDs,
        string $slug,
        \DateTimeInterface $startTime,
        ?string $locale = null,
        ?string $timezone = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalMeetingBookingResponse;
}
