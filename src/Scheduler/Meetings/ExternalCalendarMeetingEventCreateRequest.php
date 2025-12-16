<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalAssociationCreateRequestShape from \HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest
 * @phpstan-import-type ExternalEmailReminderScheduleShape from \HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule
 * @phpstan-import-type ExternalCalendarMeetingEventCreatePropertiesShape from \HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties
 *
 * @phpstan-type ExternalCalendarMeetingEventCreateRequestShape = array{
 *   associations: list<ExternalAssociationCreateRequestShape>,
 *   emailReminderSchedule: ExternalEmailReminderSchedule|ExternalEmailReminderScheduleShape,
 *   properties: ExternalCalendarMeetingEventCreateProperties|ExternalCalendarMeetingEventCreatePropertiesShape,
 *   timezone: string,
 * }
 */
final class ExternalCalendarMeetingEventCreateRequest implements BaseModel
{
    /** @use SdkModel<ExternalCalendarMeetingEventCreateRequestShape> */
    use SdkModel;

    /** @var list<ExternalAssociationCreateRequest> $associations */
    #[Required(list: ExternalAssociationCreateRequest::class)]
    public array $associations;

    #[Required]
    public ExternalEmailReminderSchedule $emailReminderSchedule;

    #[Required]
    public ExternalCalendarMeetingEventCreateProperties $properties;

    #[Required]
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
     * @param list<ExternalAssociationCreateRequestShape> $associations
     * @param ExternalEmailReminderScheduleShape $emailReminderSchedule
     * @param ExternalCalendarMeetingEventCreatePropertiesShape $properties
     */
    public static function with(
        array $associations,
        ExternalEmailReminderSchedule|array $emailReminderSchedule,
        ExternalCalendarMeetingEventCreateProperties|array $properties,
        string $timezone,
    ): self {
        $self = new self;

        $self['associations'] = $associations;
        $self['emailReminderSchedule'] = $emailReminderSchedule;
        $self['properties'] = $properties;
        $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * @param list<ExternalAssociationCreateRequestShape> $associations
     */
    public function withAssociations(array $associations): self
    {
        $self = clone $this;
        $self['associations'] = $associations;

        return $self;
    }

    /**
     * @param ExternalEmailReminderScheduleShape $emailReminderSchedule
     */
    public function withEmailReminderSchedule(
        ExternalEmailReminderSchedule|array $emailReminderSchedule
    ): self {
        $self = clone $this;
        $self['emailReminderSchedule'] = $emailReminderSchedule;

        return $self;
    }

    /**
     * @param ExternalCalendarMeetingEventCreatePropertiesShape $properties
     */
    public function withProperties(
        ExternalCalendarMeetingEventCreateProperties|array $properties
    ): self {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
