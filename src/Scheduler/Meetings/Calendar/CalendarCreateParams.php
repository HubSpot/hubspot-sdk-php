<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\Calendar;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;
use HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;
use HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule;
use HubspotSDK\Scheduler\Meetings\ExternalReminder;

/**
 * @see HubspotSDK\Services\Scheduler\Meetings\CalendarService::create()
 *
 * @phpstan-type CalendarCreateParamsShape = array{
 *   organizerUserID: string,
 *   associations: list<ExternalAssociationCreateRequest|array{
 *     to: PublicObjectID, types: list<AssociationSpec>
 *   }>,
 *   emailReminderSchedule: ExternalEmailReminderSchedule|array{
 *     reminders: list<ExternalReminder>, shouldIncludeInviteDescription: bool
 *   },
 *   properties: ExternalCalendarMeetingEventCreateProperties|array{
 *     hsMeetingEndTime: \DateTimeInterface,
 *     hsMeetingOutcome: string,
 *     hsMeetingStartTime: \DateTimeInterface,
 *     hsMeetingTitle: string,
 *     hsTimestamp: \DateTimeInterface,
 *     hubspotOwnerID: string,
 *     hsActivityType?: string|null,
 *     hsAttachmentIDs?: list<string>|null,
 *     hsAttendeeOwnerIDs?: list<string>|null,
 *     hsInternalMeetingNotes?: string|null,
 *     hsMeetingBody?: string|null,
 *     hsMeetingLocation?: string|null,
 *     hsMeetingLocationType?: string|null,
 *   },
 *   timezone: string,
 * }
 */
final class CalendarCreateParams implements BaseModel
{
    /** @use SdkModel<CalendarCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $organizerUserID;

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
     * `new CalendarCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalendarCreateParams::with(
     *   organizerUserID: ...,
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
        string $organizerUserID,
        array $associations,
        ExternalEmailReminderSchedule|array $emailReminderSchedule,
        ExternalCalendarMeetingEventCreateProperties|array $properties,
        string $timezone,
    ): self {
        $self = new self;

        $self['organizerUserID'] = $organizerUserID;
        $self['associations'] = $associations;
        $self['emailReminderSchedule'] = $emailReminderSchedule;
        $self['properties'] = $properties;
        $self['timezone'] = $timezone;

        return $self;
    }

    public function withOrganizerUserID(string $organizerUserID): self
    {
        $self = clone $this;
        $self['organizerUserID'] = $organizerUserID;

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
