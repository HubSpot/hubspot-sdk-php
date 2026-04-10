<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties\HsMeetingLocationType;

/**
 * @phpstan-type ExternalCalendarMeetingEventCreatePropertiesShape = array{
 *   hsMeetingEndTime: \DateTimeInterface,
 *   hsMeetingOutcome: string,
 *   hsMeetingStartTime: \DateTimeInterface,
 *   hsMeetingTitle: string,
 *   hsTimestamp: \DateTimeInterface,
 *   hubSpotOwnerID: string,
 *   hsActivityType?: string|null,
 *   hsAttachmentIDs?: list<string>|null,
 *   hsAttendeeOwnerIDs?: list<string>|null,
 *   hsInternalMeetingNotes?: string|null,
 *   hsMeetingBody?: string|null,
 *   hsMeetingLocation?: string|null,
 *   hsMeetingLocationType?: null|HsMeetingLocationType|value-of<HsMeetingLocationType>,
 * }
 */
final class ExternalCalendarMeetingEventCreateProperties implements BaseModel
{
    /** @use SdkModel<ExternalCalendarMeetingEventCreatePropertiesShape> */
    use SdkModel;

    /**
     * The time that the meeting should end in ISO 8601 format.
     */
    #[Required('hs_meeting_end_time')]
    public \DateTimeInterface $hsMeetingEndTime;

    /**
     * The outcome of the meeting. Acceptable default values are: SCHEDULED, COMPLETED, RESCHEDULED, NO_SHOW, CANCELED. This property can be changed to include additional custom values.
     */
    #[Required('hs_meeting_outcome')]
    public string $hsMeetingOutcome;

    /**
     * The time that the meeting should start in ISO 8601 format.
     */
    #[Required('hs_meeting_start_time')]
    public \DateTimeInterface $hsMeetingStartTime;

    /**
     * The title of the meeting and calendar event.
     */
    #[Required('hs_meeting_title')]
    public string $hsMeetingTitle;

    /**
     * The time that the meeting should start in ISO 8601 format. This value should be the same as `hs_meeting_start_time`.
     */
    #[Required('hs_timestamp')]
    public \DateTimeInterface $hsTimestamp;

    /**
     * The ownerId of the HubSpot user who will host the meeting.
     */
    #[Required('hubspot_owner_id')]
    public string $hubSpotOwnerID;

    /**
     * The activity type of the meeting. Acceptable values are based on portal defined call and meeting types.
     */
    #[Optional('hs_activity_type')]
    public ?string $hsActivityType;

    /** @var list<string>|null $hsAttachmentIDs */
    #[Optional('hs_attachment_ids', list: 'string')]
    public ?array $hsAttachmentIDs;

    /** @var list<string>|null $hsAttendeeOwnerIDs */
    #[Optional('hs_attendee_owner_ids', list: 'string')]
    public ?array $hsAttendeeOwnerIDs;

    /**
     * Internal notes related to the meeting.
     */
    #[Optional('hs_internal_meeting_notes')]
    public ?string $hsInternalMeetingNotes;

    /**
     * The description of the meeting and calendar event.
     */
    #[Optional('hs_meeting_body')]
    public ?string $hsMeetingBody;

    /**
     * The physical address, virtual location, or phone number where the meeting will take place.
     */
    #[Optional('hs_meeting_location')]
    public ?string $hsMeetingLocation;

    /**
     * The type of location for the meeting. Acceptable values are: ADDRESS, CUSTOM, PHONE.
     *
     * @var value-of<HsMeetingLocationType>|null $hsMeetingLocationType
     */
    #[Optional('hs_meeting_location_type', enum: HsMeetingLocationType::class)]
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
     *   hubSpotOwnerID: ...,
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
     *   ->withHubSpotOwnerID(...)
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
     * @param HsMeetingLocationType|value-of<HsMeetingLocationType>|null $hsMeetingLocationType
     */
    public static function with(
        \DateTimeInterface $hsMeetingEndTime,
        string $hsMeetingOutcome,
        \DateTimeInterface $hsMeetingStartTime,
        string $hsMeetingTitle,
        \DateTimeInterface $hsTimestamp,
        string $hubSpotOwnerID,
        ?string $hsActivityType = null,
        ?array $hsAttachmentIDs = null,
        ?array $hsAttendeeOwnerIDs = null,
        ?string $hsInternalMeetingNotes = null,
        ?string $hsMeetingBody = null,
        ?string $hsMeetingLocation = null,
        HsMeetingLocationType|string|null $hsMeetingLocationType = null,
    ): self {
        $self = new self;

        $self['hsMeetingEndTime'] = $hsMeetingEndTime;
        $self['hsMeetingOutcome'] = $hsMeetingOutcome;
        $self['hsMeetingStartTime'] = $hsMeetingStartTime;
        $self['hsMeetingTitle'] = $hsMeetingTitle;
        $self['hsTimestamp'] = $hsTimestamp;
        $self['hubSpotOwnerID'] = $hubSpotOwnerID;

        null !== $hsActivityType && $self['hsActivityType'] = $hsActivityType;
        null !== $hsAttachmentIDs && $self['hsAttachmentIDs'] = $hsAttachmentIDs;
        null !== $hsAttendeeOwnerIDs && $self['hsAttendeeOwnerIDs'] = $hsAttendeeOwnerIDs;
        null !== $hsInternalMeetingNotes && $self['hsInternalMeetingNotes'] = $hsInternalMeetingNotes;
        null !== $hsMeetingBody && $self['hsMeetingBody'] = $hsMeetingBody;
        null !== $hsMeetingLocation && $self['hsMeetingLocation'] = $hsMeetingLocation;
        null !== $hsMeetingLocationType && $self['hsMeetingLocationType'] = $hsMeetingLocationType;

        return $self;
    }

    /**
     * The time that the meeting should end in ISO 8601 format.
     */
    public function withHsMeetingEndTime(
        \DateTimeInterface $hsMeetingEndTime
    ): self {
        $self = clone $this;
        $self['hsMeetingEndTime'] = $hsMeetingEndTime;

        return $self;
    }

    /**
     * The outcome of the meeting. Acceptable default values are: SCHEDULED, COMPLETED, RESCHEDULED, NO_SHOW, CANCELED. This property can be changed to include additional custom values.
     */
    public function withHsMeetingOutcome(string $hsMeetingOutcome): self
    {
        $self = clone $this;
        $self['hsMeetingOutcome'] = $hsMeetingOutcome;

        return $self;
    }

    /**
     * The time that the meeting should start in ISO 8601 format.
     */
    public function withHsMeetingStartTime(
        \DateTimeInterface $hsMeetingStartTime
    ): self {
        $self = clone $this;
        $self['hsMeetingStartTime'] = $hsMeetingStartTime;

        return $self;
    }

    /**
     * The title of the meeting and calendar event.
     */
    public function withHsMeetingTitle(string $hsMeetingTitle): self
    {
        $self = clone $this;
        $self['hsMeetingTitle'] = $hsMeetingTitle;

        return $self;
    }

    /**
     * The time that the meeting should start in ISO 8601 format. This value should be the same as `hs_meeting_start_time`.
     */
    public function withHsTimestamp(\DateTimeInterface $hsTimestamp): self
    {
        $self = clone $this;
        $self['hsTimestamp'] = $hsTimestamp;

        return $self;
    }

    /**
     * The ownerId of the HubSpot user who will host the meeting.
     */
    public function withHubSpotOwnerID(string $hubSpotOwnerID): self
    {
        $self = clone $this;
        $self['hubSpotOwnerID'] = $hubSpotOwnerID;

        return $self;
    }

    /**
     * The activity type of the meeting. Acceptable values are based on portal defined call and meeting types.
     */
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

    /**
     * Internal notes related to the meeting.
     */
    public function withHsInternalMeetingNotes(
        string $hsInternalMeetingNotes
    ): self {
        $self = clone $this;
        $self['hsInternalMeetingNotes'] = $hsInternalMeetingNotes;

        return $self;
    }

    /**
     * The description of the meeting and calendar event.
     */
    public function withHsMeetingBody(string $hsMeetingBody): self
    {
        $self = clone $this;
        $self['hsMeetingBody'] = $hsMeetingBody;

        return $self;
    }

    /**
     * The physical address, virtual location, or phone number where the meeting will take place.
     */
    public function withHsMeetingLocation(string $hsMeetingLocation): self
    {
        $self = clone $this;
        $self['hsMeetingLocation'] = $hsMeetingLocation;

        return $self;
    }

    /**
     * The type of location for the meeting. Acceptable values are: ADDRESS, CUSTOM, PHONE.
     *
     * @param HsMeetingLocationType|value-of<HsMeetingLocationType> $hsMeetingLocationType
     */
    public function withHsMeetingLocationType(
        HsMeetingLocationType|string $hsMeetingLocationType
    ): self {
        $self = clone $this;
        $self['hsMeetingLocationType'] = $hsMeetingLocationType;

        return $self;
    }
}
