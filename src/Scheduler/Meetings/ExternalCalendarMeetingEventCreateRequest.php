<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

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
     * @param list<ExternalAssociationCreateRequest|array{
     *   to: PublicObjectID, types: list<AssociationSpec>
     * }> $associations
     * @param ExternalEmailReminderSchedule|array{
     *   reminders: list<ExternalReminder>, shouldIncludeInviteDescription: bool
     * } $emailReminderSchedule
     * @param ExternalCalendarMeetingEventCreateProperties|array{
     *   hsMeetingEndTime: \DateTimeInterface,
     *   hsMeetingOutcome: string,
     *   hsMeetingStartTime: \DateTimeInterface,
     *   hsMeetingTitle: string,
     *   hsTimestamp: \DateTimeInterface,
     *   hubspotOwnerID: string,
     *   hsActivityType?: string|null,
     *   hsAttachmentIDs?: list<string>|null,
     *   hsAttendeeOwnerIDs?: list<string>|null,
     *   hsInternalMeetingNotes?: string|null,
     *   hsMeetingBody?: string|null,
     *   hsMeetingLocation?: string|null,
     *   hsMeetingLocationType?: string|null,
     * } $properties
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
     * @param list<ExternalAssociationCreateRequest|array{
     *   to: PublicObjectID, types: list<AssociationSpec>
     * }> $associations
     */
    public function withAssociations(array $associations): self
    {
        $self = clone $this;
        $self['associations'] = $associations;

        return $self;
    }

    /**
     * @param ExternalEmailReminderSchedule|array{
     *   reminders: list<ExternalReminder>, shouldIncludeInviteDescription: bool
     * } $emailReminderSchedule
     */
    public function withEmailReminderSchedule(
        ExternalEmailReminderSchedule|array $emailReminderSchedule
    ): self {
        $self = clone $this;
        $self['emailReminderSchedule'] = $emailReminderSchedule;

        return $self;
    }

    /**
     * @param ExternalCalendarMeetingEventCreateProperties|array{
     *   hsMeetingEndTime: \DateTimeInterface,
     *   hsMeetingOutcome: string,
     *   hsMeetingStartTime: \DateTimeInterface,
     *   hsMeetingTitle: string,
     *   hsTimestamp: \DateTimeInterface,
     *   hubspotOwnerID: string,
     *   hsActivityType?: string|null,
     *   hsAttachmentIDs?: list<string>|null,
     *   hsAttendeeOwnerIDs?: list<string>|null,
     *   hsInternalMeetingNotes?: string|null,
     *   hsMeetingBody?: string|null,
     *   hsMeetingLocation?: string|null,
     *   hsMeetingLocationType?: string|null,
     * } $properties
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
