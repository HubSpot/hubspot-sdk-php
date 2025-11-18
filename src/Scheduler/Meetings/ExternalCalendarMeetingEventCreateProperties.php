<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalCalendarMeetingEventCreatePropertiesShape = array{
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
 * }
 */
final class ExternalCalendarMeetingEventCreateProperties implements BaseModel
{
    /** @use SdkModel<ExternalCalendarMeetingEventCreatePropertiesShape> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $hs_meeting_end_time;

    #[Api]
    public string $hs_meeting_outcome;

    #[Api]
    public \DateTimeInterface $hs_meeting_start_time;

    #[Api]
    public string $hs_meeting_title;

    #[Api]
    public \DateTimeInterface $hs_timestamp;

    #[Api]
    public string $hubspot_owner_id;

    #[Api(optional: true)]
    public ?string $hs_activity_type;

    /** @var list<string>|null $hs_attachment_ids */
    #[Api(list: 'string', optional: true)]
    public ?array $hs_attachment_ids;

    /** @var list<string>|null $hs_attendee_owner_ids */
    #[Api(list: 'string', optional: true)]
    public ?array $hs_attendee_owner_ids;

    #[Api(optional: true)]
    public ?string $hs_internal_meeting_notes;

    #[Api(optional: true)]
    public ?string $hs_meeting_body;

    #[Api(optional: true)]
    public ?string $hs_meeting_location;

    #[Api(optional: true)]
    public ?string $hs_meeting_location_type;

    /**
     * `new ExternalCalendarMeetingEventCreateProperties()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalCalendarMeetingEventCreateProperties::with(
     *   hs_meeting_end_time: ...,
     *   hs_meeting_outcome: ...,
     *   hs_meeting_start_time: ...,
     *   hs_meeting_title: ...,
     *   hs_timestamp: ...,
     *   hubspot_owner_id: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalCalendarMeetingEventCreateProperties)
     *   ->withHsMeetingEndTime(...)
     *   ->withHsMeetingOutcome(...)
     *   ->withHsMeetingStartTime(...)
     *   ->withHsMeetingTitle(...)
     *   ->withHsTimestamp(...)
     *   ->withHubspotOwnerID(...)
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
     * @param list<string> $hs_attachment_ids
     * @param list<string> $hs_attendee_owner_ids
     */
    public static function with(
        \DateTimeInterface $hs_meeting_end_time,
        string $hs_meeting_outcome,
        \DateTimeInterface $hs_meeting_start_time,
        string $hs_meeting_title,
        \DateTimeInterface $hs_timestamp,
        string $hubspot_owner_id,
        ?string $hs_activity_type = null,
        ?array $hs_attachment_ids = null,
        ?array $hs_attendee_owner_ids = null,
        ?string $hs_internal_meeting_notes = null,
        ?string $hs_meeting_body = null,
        ?string $hs_meeting_location = null,
        ?string $hs_meeting_location_type = null,
    ): self {
        $obj = new self;

        $obj->hs_meeting_end_time = $hs_meeting_end_time;
        $obj->hs_meeting_outcome = $hs_meeting_outcome;
        $obj->hs_meeting_start_time = $hs_meeting_start_time;
        $obj->hs_meeting_title = $hs_meeting_title;
        $obj->hs_timestamp = $hs_timestamp;
        $obj->hubspot_owner_id = $hubspot_owner_id;

        null !== $hs_activity_type && $obj->hs_activity_type = $hs_activity_type;
        null !== $hs_attachment_ids && $obj->hs_attachment_ids = $hs_attachment_ids;
        null !== $hs_attendee_owner_ids && $obj->hs_attendee_owner_ids = $hs_attendee_owner_ids;
        null !== $hs_internal_meeting_notes && $obj->hs_internal_meeting_notes = $hs_internal_meeting_notes;
        null !== $hs_meeting_body && $obj->hs_meeting_body = $hs_meeting_body;
        null !== $hs_meeting_location && $obj->hs_meeting_location = $hs_meeting_location;
        null !== $hs_meeting_location_type && $obj->hs_meeting_location_type = $hs_meeting_location_type;

        return $obj;
    }

    public function withHsMeetingEndTime(
        \DateTimeInterface $hsMeetingEndTime
    ): self {
        $obj = clone $this;
        $obj->hs_meeting_end_time = $hsMeetingEndTime;

        return $obj;
    }

    public function withHsMeetingOutcome(string $hsMeetingOutcome): self
    {
        $obj = clone $this;
        $obj->hs_meeting_outcome = $hsMeetingOutcome;

        return $obj;
    }

    public function withHsMeetingStartTime(
        \DateTimeInterface $hsMeetingStartTime
    ): self {
        $obj = clone $this;
        $obj->hs_meeting_start_time = $hsMeetingStartTime;

        return $obj;
    }

    public function withHsMeetingTitle(string $hsMeetingTitle): self
    {
        $obj = clone $this;
        $obj->hs_meeting_title = $hsMeetingTitle;

        return $obj;
    }

    public function withHsTimestamp(\DateTimeInterface $hsTimestamp): self
    {
        $obj = clone $this;
        $obj->hs_timestamp = $hsTimestamp;

        return $obj;
    }

    public function withHubspotOwnerID(string $hubspotOwnerID): self
    {
        $obj = clone $this;
        $obj->hubspot_owner_id = $hubspotOwnerID;

        return $obj;
    }

    public function withHsActivityType(string $hsActivityType): self
    {
        $obj = clone $this;
        $obj->hs_activity_type = $hsActivityType;

        return $obj;
    }

    /**
     * @param list<string> $hsAttachmentIDs
     */
    public function withHsAttachmentIDs(array $hsAttachmentIDs): self
    {
        $obj = clone $this;
        $obj->hs_attachment_ids = $hsAttachmentIDs;

        return $obj;
    }

    /**
     * @param list<string> $hsAttendeeOwnerIDs
     */
    public function withHsAttendeeOwnerIDs(array $hsAttendeeOwnerIDs): self
    {
        $obj = clone $this;
        $obj->hs_attendee_owner_ids = $hsAttendeeOwnerIDs;

        return $obj;
    }

    public function withHsInternalMeetingNotes(
        string $hsInternalMeetingNotes
    ): self {
        $obj = clone $this;
        $obj->hs_internal_meeting_notes = $hsInternalMeetingNotes;

        return $obj;
    }

    public function withHsMeetingBody(string $hsMeetingBody): self
    {
        $obj = clone $this;
        $obj->hs_meeting_body = $hsMeetingBody;

        return $obj;
    }

    public function withHsMeetingLocation(string $hsMeetingLocation): self
    {
        $obj = clone $this;
        $obj->hs_meeting_location = $hsMeetingLocation;

        return $obj;
    }

    public function withHsMeetingLocationType(
        string $hsMeetingLocationType
    ): self {
        $obj = clone $this;
        $obj->hs_meeting_location_type = $hsMeetingLocationType;

        return $obj;
    }
}
