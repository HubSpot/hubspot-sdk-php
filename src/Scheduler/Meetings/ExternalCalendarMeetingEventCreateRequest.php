<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Api;
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
        array $associations,
        ExternalEmailReminderSchedule|array $emailReminderSchedule,
        ExternalCalendarMeetingEventCreateProperties|array $properties,
        string $timezone,
    ): self {
        $obj = new self;

        $obj['associations'] = $associations;
        $obj['emailReminderSchedule'] = $emailReminderSchedule;
        $obj['properties'] = $properties;
        $obj['timezone'] = $timezone;

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
