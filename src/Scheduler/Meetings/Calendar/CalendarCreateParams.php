<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\Calendar;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Api;
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
 *   organizerUserId: string,
 *   associations: list<ExternalAssociationCreateRequest|array{
 *     to: PublicObjectID, types: list<AssociationSpec>
 *   }>,
 *   emailReminderSchedule: ExternalEmailReminderSchedule|array{
 *     reminders: list<ExternalReminder>, shouldIncludeInviteDescription: bool
 *   },
 *   properties: ExternalCalendarMeetingEventCreateProperties|array{
 *     hs_meeting_end_time: \DateTimeInterface,
 *     hs_meeting_outcome: string,
 *     hs_meeting_start_time: \DateTimeInterface,
 *     hs_meeting_title: string,
 *     hs_timestamp: \DateTimeInterface,
 *     hubspot_owner_id: string,
 *     hs_activity_type?: string|null,
 *     hs_attachment_ids?: list<string>|null,
 *     hs_attendee_owner_ids?: list<string>|null,
 *     hs_internal_meeting_notes?: string|null,
 *     hs_meeting_body?: string|null,
 *     hs_meeting_location?: string|null,
 *     hs_meeting_location_type?: string|null,
 *   },
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
     * @param list<ExternalAssociationCreateRequest|array{
     *   to: PublicObjectID, types: list<AssociationSpec>
     * }> $associations
     * @param ExternalEmailReminderSchedule|array{
     *   reminders: list<ExternalReminder>, shouldIncludeInviteDescription: bool
     * } $emailReminderSchedule
     * @param ExternalCalendarMeetingEventCreateProperties|array{
     *   hs_meeting_end_time: \DateTimeInterface,
     *   hs_meeting_outcome: string,
     *   hs_meeting_start_time: \DateTimeInterface,
     *   hs_meeting_title: string,
     *   hs_timestamp: \DateTimeInterface,
     *   hubspot_owner_id: string,
     *   hs_activity_type?: string|null,
     *   hs_attachment_ids?: list<string>|null,
     *   hs_attendee_owner_ids?: list<string>|null,
     *   hs_internal_meeting_notes?: string|null,
     *   hs_meeting_body?: string|null,
     *   hs_meeting_location?: string|null,
     *   hs_meeting_location_type?: string|null,
     * } $properties
     */
    public static function with(
        string $organizerUserId,
        array $associations,
        ExternalEmailReminderSchedule|array $emailReminderSchedule,
        ExternalCalendarMeetingEventCreateProperties|array $properties,
        string $timezone,
    ): self {
        $obj = new self;

        $obj['organizerUserId'] = $organizerUserId;
        $obj['associations'] = $associations;
        $obj['emailReminderSchedule'] = $emailReminderSchedule;
        $obj['properties'] = $properties;
        $obj['timezone'] = $timezone;

        return $obj;
    }

    public function withOrganizerUserID(string $organizerUserID): self
    {
        $obj = clone $this;
        $obj['organizerUserId'] = $organizerUserID;

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
     *   hs_meeting_end_time: \DateTimeInterface,
     *   hs_meeting_outcome: string,
     *   hs_meeting_start_time: \DateTimeInterface,
     *   hs_meeting_title: string,
     *   hs_timestamp: \DateTimeInterface,
     *   hubspot_owner_id: string,
     *   hs_activity_type?: string|null,
     *   hs_attachment_ids?: list<string>|null,
     *   hs_attendee_owner_ids?: list<string>|null,
     *   hs_internal_meeting_notes?: string|null,
     *   hs_meeting_body?: string|null,
     *   hs_meeting_location?: string|null,
     *   hs_meeting_location_type?: string|null,
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
