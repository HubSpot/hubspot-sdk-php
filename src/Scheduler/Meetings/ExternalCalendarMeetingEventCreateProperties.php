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
     * @param list<string>|null $hsAttachmentIDs
     * @param list<string>|null $hsAttendeeOwnerIDs
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
        $self = new self;

        $self['hsMeetingEndTime'] = $hsMeetingEndTime;
        $self['hsMeetingOutcome'] = $hsMeetingOutcome;
        $self['hsMeetingStartTime'] = $hsMeetingStartTime;
        $self['hsMeetingTitle'] = $hsMeetingTitle;
        $self['hsTimestamp'] = $hsTimestamp;
        $self['hubspotOwnerID'] = $hubspotOwnerID;

        null !== $hsActivityType && $self['hsActivityType'] = $hsActivityType;
        null !== $hsAttachmentIDs && $self['hsAttachmentIDs'] = $hsAttachmentIDs;
        null !== $hsAttendeeOwnerIDs && $self['hsAttendeeOwnerIDs'] = $hsAttendeeOwnerIDs;
        null !== $hsInternalMeetingNotes && $self['hsInternalMeetingNotes'] = $hsInternalMeetingNotes;
        null !== $hsMeetingBody && $self['hsMeetingBody'] = $hsMeetingBody;
        null !== $hsMeetingLocation && $self['hsMeetingLocation'] = $hsMeetingLocation;
        null !== $hsMeetingLocationType && $self['hsMeetingLocationType'] = $hsMeetingLocationType;

        return $self;
    }

    public function withHsMeetingEndTime(
        \DateTimeInterface $hsMeetingEndTime
    ): self {
        $self = clone $this;
        $self['hsMeetingEndTime'] = $hsMeetingEndTime;

        return $self;
    }

    public function withHsMeetingOutcome(string $hsMeetingOutcome): self
    {
        $self = clone $this;
        $self['hsMeetingOutcome'] = $hsMeetingOutcome;

        return $self;
    }

    public function withHsMeetingStartTime(
        \DateTimeInterface $hsMeetingStartTime
    ): self {
        $self = clone $this;
        $self['hsMeetingStartTime'] = $hsMeetingStartTime;

        return $self;
    }

    public function withHsMeetingTitle(string $hsMeetingTitle): self
    {
        $self = clone $this;
        $self['hsMeetingTitle'] = $hsMeetingTitle;

        return $self;
    }

    public function withHsTimestamp(\DateTimeInterface $hsTimestamp): self
    {
        $self = clone $this;
        $self['hsTimestamp'] = $hsTimestamp;

        return $self;
    }

    public function withHubspotOwnerID(string $hubspotOwnerID): self
    {
        $self = clone $this;
        $self['hubspotOwnerID'] = $hubspotOwnerID;

        return $self;
    }

    public function withHsActivityType(string $hsActivityType): self
    {
        $self = clone $this;
        $self['hsActivityType'] = $hsActivityType;

        return $self;
    }

    /**
     * @param list<string> $hsAttachmentIDs
     */
    public function withHsAttachmentIDs(array $hsAttachmentIDs): self
    {
        $self = clone $this;
        $self['hsAttachmentIDs'] = $hsAttachmentIDs;

        return $self;
    }

    /**
     * @param list<string> $hsAttendeeOwnerIDs
     */
    public function withHsAttendeeOwnerIDs(array $hsAttendeeOwnerIDs): self
    {
        $self = clone $this;
        $self['hsAttendeeOwnerIDs'] = $hsAttendeeOwnerIDs;

        return $self;
    }

    public function withHsInternalMeetingNotes(
        string $hsInternalMeetingNotes
    ): self {
        $self = clone $this;
        $self['hsInternalMeetingNotes'] = $hsInternalMeetingNotes;

        return $self;
    }

    public function withHsMeetingBody(string $hsMeetingBody): self
    {
        $self = clone $this;
        $self['hsMeetingBody'] = $hsMeetingBody;

        return $self;
    }

    public function withHsMeetingLocation(string $hsMeetingLocation): self
    {
        $self = clone $this;
        $self['hsMeetingLocation'] = $hsMeetingLocation;

        return $self;
    }

    public function withHsMeetingLocationType(
        string $hsMeetingLocationType
    ): self {
        $self = clone $this;
        $self['hsMeetingLocationType'] = $hsMeetingLocationType;

        return $self;
    }
}
