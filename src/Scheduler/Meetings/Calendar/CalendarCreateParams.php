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
        $obj = new self;

        $obj['organizerUserID'] = $organizerUserID;
        $obj['associations'] = $associations;
        $obj['emailReminderSchedule'] = $emailReminderSchedule;
        $obj['properties'] = $properties;
        $obj['timezone'] = $timezone;

        return $obj;
    }

    public function withOrganizerUserID(string $organizerUserID): self
    {
        $obj = clone $this;
        $obj['organizerUserID'] = $organizerUserID;

        return $obj;
    }

    /**
     * @param list<ExternalAssociationCreateRequest|array{
     *   to: PublicObjectID, types: list<AssociationSpec>
     * }> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj['associations'] = $associations;

        return $obj;
    }

    /**
     * @param ExternalEmailReminderSchedule|array{
     *   reminders: list<ExternalReminder>, shouldIncludeInviteDescription: bool
     * } $emailReminderSchedule
     */
    public function withEmailReminderSchedule(
        ExternalEmailReminderSchedule|array $emailReminderSchedule
    ): self {
        $obj = clone $this;
        $obj['emailReminderSchedule'] = $emailReminderSchedule;

        return $obj;
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
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj['timezone'] = $timezone;

        return $obj;
    }
}
