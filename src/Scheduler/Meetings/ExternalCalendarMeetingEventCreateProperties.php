<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalCalendarMeetingEventCreatePropertiesShape = array{
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
 * }
 */
final class ExternalCalendarMeetingEventCreateProperties implements BaseModel
{
    /** @use SdkModel<ExternalCalendarMeetingEventCreatePropertiesShape> */
    use SdkModel;

    #[Required('hs_meeting_end_time')]
    public \DateTimeInterface $hsMeetingEndTime;

    #[Required('hs_meeting_outcome')]
    public string $hsMeetingOutcome;

    #[Required('hs_meeting_start_time')]
    public \DateTimeInterface $hsMeetingStartTime;

    #[Required('hs_meeting_title')]
    public string $hsMeetingTitle;

    #[Required('hs_timestamp')]
    public \DateTimeInterface $hsTimestamp;

    #[Required('hubspot_owner_id')]
    public string $hubspotOwnerID;

    #[Optional('hs_activity_type')]
    public ?string $hsActivityType;

    /** @var list<string>|null $hsAttachmentIDs */
    #[Optional('hs_attachment_ids', list: 'string')]
    public ?array $hsAttachmentIDs;

    /** @var list<string>|null $hsAttendeeOwnerIDs */
    #[Optional('hs_attendee_owner_ids', list: 'string')]
    public ?array $hsAttendeeOwnerIDs;

    #[Optional('hs_internal_meeting_notes')]
    public ?string $hsInternalMeetingNotes;

    #[Optional('hs_meeting_body')]
    public ?string $hsMeetingBody;

    #[Optional('hs_meeting_location')]
    public ?string $hsMeetingLocation;

    #[Optional('hs_meeting_location_type')]
    public ?string $hsMeetingLocationType;

    /**
     * `new ExternalCalendarMeetingEventCreateProperties()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalCalendarMeetingEventCreateProperties::with(
     *   hsMeetingEndTime: ...,
     *   hsMeetingOutcome: ...,
     *   hsMeetingStartTime: ...,
     *   hsMeetingTitle: ...,
     *   hsTimestamp: ...,
     *   hubspotOwnerID: ...,
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
     * @param list<string> $hsAttachmentIDs
     * @param list<string> $hsAttendeeOwnerIDs
     */
    public static function with(
        \DateTimeInterface $hsMeetingEndTime,
        string $hsMeetingOutcome,
        \DateTimeInterface $hsMeetingStartTime,
        string $hsMeetingTitle,
        \DateTimeInterface $hsTimestamp,
        string $hubspotOwnerID,
        ?string $hsActivityType = null,
        ?array $hsAttachmentIDs = null,
        ?array $hsAttendeeOwnerIDs = null,
        ?string $hsInternalMeetingNotes = null,
        ?string $hsMeetingBody = null,
        ?string $hsMeetingLocation = null,
        ?string $hsMeetingLocationType = null,
    ): self {
        $obj = new self;

        $obj['hsMeetingEndTime'] = $hsMeetingEndTime;
        $obj['hsMeetingOutcome'] = $hsMeetingOutcome;
        $obj['hsMeetingStartTime'] = $hsMeetingStartTime;
        $obj['hsMeetingTitle'] = $hsMeetingTitle;
        $obj['hsTimestamp'] = $hsTimestamp;
        $obj['hubspotOwnerID'] = $hubspotOwnerID;

        null !== $hsActivityType && $obj['hsActivityType'] = $hsActivityType;
        null !== $hsAttachmentIDs && $obj['hsAttachmentIDs'] = $hsAttachmentIDs;
        null !== $hsAttendeeOwnerIDs && $obj['hsAttendeeOwnerIDs'] = $hsAttendeeOwnerIDs;
        null !== $hsInternalMeetingNotes && $obj['hsInternalMeetingNotes'] = $hsInternalMeetingNotes;
        null !== $hsMeetingBody && $obj['hsMeetingBody'] = $hsMeetingBody;
        null !== $hsMeetingLocation && $obj['hsMeetingLocation'] = $hsMeetingLocation;
        null !== $hsMeetingLocationType && $obj['hsMeetingLocationType'] = $hsMeetingLocationType;

        return $obj;
    }

    public function withHsMeetingEndTime(
        \DateTimeInterface $hsMeetingEndTime
    ): self {
        $obj = clone $this;
        $obj['hsMeetingEndTime'] = $hsMeetingEndTime;

        return $obj;
    }

    public function withHsMeetingOutcome(string $hsMeetingOutcome): self
    {
        $obj = clone $this;
        $obj['hsMeetingOutcome'] = $hsMeetingOutcome;

        return $obj;
    }

    public function withHsMeetingStartTime(
        \DateTimeInterface $hsMeetingStartTime
    ): self {
        $obj = clone $this;
        $obj['hsMeetingStartTime'] = $hsMeetingStartTime;

        return $obj;
    }

    public function withHsMeetingTitle(string $hsMeetingTitle): self
    {
        $obj = clone $this;
        $obj['hsMeetingTitle'] = $hsMeetingTitle;

        return $obj;
    }

    public function withHsTimestamp(\DateTimeInterface $hsTimestamp): self
    {
        $obj = clone $this;
        $obj['hsTimestamp'] = $hsTimestamp;

        return $obj;
    }

    public function withHubspotOwnerID(string $hubspotOwnerID): self
    {
        $obj = clone $this;
        $obj['hubspotOwnerID'] = $hubspotOwnerID;

        return $obj;
    }

    public function withHsActivityType(string $hsActivityType): self
    {
        $obj = clone $this;
        $obj['hsActivityType'] = $hsActivityType;

        return $obj;
    }

    /**
     * @param list<string> $hsAttachmentIDs
     */
    public function withHsAttachmentIDs(array $hsAttachmentIDs): self
    {
        $obj = clone $this;
        $obj['hsAttachmentIDs'] = $hsAttachmentIDs;

        return $obj;
    }

    /**
     * @param list<string> $hsAttendeeOwnerIDs
     */
    public function withHsAttendeeOwnerIDs(array $hsAttendeeOwnerIDs): self
    {
        $obj = clone $this;
        $obj['hsAttendeeOwnerIDs'] = $hsAttendeeOwnerIDs;

        return $obj;
    }

    public function withHsInternalMeetingNotes(
        string $hsInternalMeetingNotes
    ): self {
        $obj = clone $this;
        $obj['hsInternalMeetingNotes'] = $hsInternalMeetingNotes;

        return $obj;
    }

    public function withHsMeetingBody(string $hsMeetingBody): self
    {
        $obj = clone $this;
        $obj['hsMeetingBody'] = $hsMeetingBody;

        return $obj;
    }

    public function withHsMeetingLocation(string $hsMeetingLocation): self
    {
        $obj = clone $this;
        $obj['hsMeetingLocation'] = $hsMeetingLocation;

        return $obj;
    }

    public function withHsMeetingLocationType(
        string $hsMeetingLocationType
    ): self {
        $obj = clone $this;
        $obj['hsMeetingLocationType'] = $hsMeetingLocationType;

        return $obj;
    }
}
