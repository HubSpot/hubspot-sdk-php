<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\Calendar;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;
use HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule;

/**
 * @see HubspotSDK\Services\Scheduler\Meetings\CalendarService::create()
 *
 * @phpstan-type CalendarCreateParamsShape = array{
 *   organizerUserId: string,
 *   associations: list<ExternalAssociationCreateRequest>,
 *   emailReminderSchedule: ExternalEmailReminderSchedule,
 *   properties: ExternalCalendarMeetingEventCreateProperties,
 *   timezone: string,
 * }
 */
final class CalendarCreateParams implements BaseModel
{
    /** @use SdkModel<CalendarCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $organizerUserId;

    /** @var list<ExternalAssociationCreateRequest> $associations */
    #[Api(list: ExternalAssociationCreateRequest::class)]
    public array $associations;

    #[Api]
    public ExternalEmailReminderSchedule $emailReminderSchedule;

    #[Api]
    public ExternalCalendarMeetingEventCreateProperties $properties;

    #[Api]
    public string $timezone;

    /**
     * `new CalendarCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalendarCreateParams::with(
     *   organizerUserId: ...,
     *   associations: ...,
     *   emailReminderSchedule: ...,
     *   properties: ...,
     *   timezone: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CalendarCreateParams)
     *   ->withOrganizerUserID(...)
     *   ->withAssociations(...)
     *   ->withEmailReminderSchedule(...)
     *   ->withProperties(...)
     *   ->withTimezone(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ExternalAssociationCreateRequest> $associations
     */
    public static function with(
        string $organizerUserId,
        array $associations,
        ExternalEmailReminderSchedule $emailReminderSchedule,
        ExternalCalendarMeetingEventCreateProperties $properties,
        string $timezone,
    ): self {
        $obj = new self;

        $obj->organizerUserId = $organizerUserId;
        $obj->associations = $associations;
        $obj->emailReminderSchedule = $emailReminderSchedule;
        $obj->properties = $properties;
        $obj->timezone = $timezone;

        return $obj;
    }

    public function withOrganizerUserID(string $organizerUserID): self
    {
        $obj = clone $this;
        $obj->organizerUserId = $organizerUserID;

        return $obj;
    }

    /**
     * @param list<ExternalAssociationCreateRequest> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }

    public function withEmailReminderSchedule(
        ExternalEmailReminderSchedule $emailReminderSchedule
    ): self {
        $obj = clone $this;
        $obj->emailReminderSchedule = $emailReminderSchedule;

        return $obj;
    }

    public function withProperties(
        ExternalCalendarMeetingEventCreateProperties $properties
    ): self {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj->timezone = $timezone;

        return $obj;
    }
}
