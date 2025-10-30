<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalCalendarMeetingEventCreateRequestShape = array{
 *   associations: list<ExternalAssociationCreateRequest>,
 *   emailReminderSchedule: ExternalEmailReminderSchedule,
 *   properties: ExternalCalendarMeetingEventCreateProperties,
 *   timezone: string,
 * }
 */
final class ExternalCalendarMeetingEventCreateRequest implements BaseModel
{
    /** @use SdkModel<ExternalCalendarMeetingEventCreateRequestShape> */
    use SdkModel;

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
     * `new ExternalCalendarMeetingEventCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalCalendarMeetingEventCreateRequest::with(
     *   associations: ..., emailReminderSchedule: ..., properties: ..., timezone: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalCalendarMeetingEventCreateRequest)
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
        array $associations,
        ExternalEmailReminderSchedule $emailReminderSchedule,
        ExternalCalendarMeetingEventCreateProperties $properties,
        string $timezone,
    ): self {
        $obj = new self;

        $obj->associations = $associations;
        $obj->emailReminderSchedule = $emailReminderSchedule;
        $obj->properties = $properties;
        $obj->timezone = $timezone;

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
