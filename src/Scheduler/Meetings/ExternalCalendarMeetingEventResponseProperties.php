<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventResponseProperties\HsEngagementSource;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventResponseProperties\HsMeetingLocationType;

/**
 * @phpstan-type ExternalCalendarMeetingEventResponsePropertiesShape = array{
 *   hsEngagementSource: HsEngagementSource|value-of<HsEngagementSource>,
 *   hsEngagementSourceID: string,
 *   hsMeetingEndTime: \DateTimeInterface,
 *   hsMeetingOutcome: string,
 *   hsMeetingStartTime: \DateTimeInterface,
 *   hsMeetingTitle: string,
 *   hsTimestamp: \DateTimeInterface,
 *   hsActivityType?: string|null,
 *   hsAttachmentIDs?: list<string>|null,
 *   hsAttendeeOwnerIDs?: list<string>|null,
 *   hsIncludeDescriptionInReminder?: string|null,
 *   hsInternalMeetingNotes?: string|null,
 *   hsMeetingBody?: string|null,
 *   hsMeetingExternalURL?: string|null,
 *   hsMeetingLocation?: string|null,
 *   hsMeetingLocationType?: null|HsMeetingLocationType|value-of<HsMeetingLocationType>,
 *   hsUniqueID?: string|null,
 *   hubspotOwnerID?: string|null,
 * }
 */
final class ExternalCalendarMeetingEventResponseProperties implements BaseModel
{
    /** @use SdkModel<ExternalCalendarMeetingEventResponsePropertiesShape> */
    use SdkModel;

    /** @var value-of<HsEngagementSource> $hsEngagementSource */
    #[Required('hs_engagement_source', enum: HsEngagementSource::class)]
    public string $hsEngagementSource;

    #[Required('hs_engagement_source_id')]
    public string $hsEngagementSourceID;

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

    #[Optional('hs_activity_type')]
    public ?string $hsActivityType;

    /** @var list<string>|null $hsAttachmentIDs */
    #[Optional('hs_attachment_ids', list: 'string')]
    public ?array $hsAttachmentIDs;

    /** @var list<string>|null $hsAttendeeOwnerIDs */
    #[Optional('hs_attendee_owner_ids', list: 'string')]
    public ?array $hsAttendeeOwnerIDs;

    #[Optional('hs_include_description_in_reminder')]
    public ?string $hsIncludeDescriptionInReminder;

    #[Optional('hs_internal_meeting_notes')]
    public ?string $hsInternalMeetingNotes;

    #[Optional('hs_meeting_body')]
    public ?string $hsMeetingBody;

    #[Optional('hs_meeting_external_url')]
    public ?string $hsMeetingExternalURL;

    #[Optional('hs_meeting_location')]
    public ?string $hsMeetingLocation;

    /** @var value-of<HsMeetingLocationType>|null $hsMeetingLocationType */
    #[Optional('hs_meeting_location_type', enum: HsMeetingLocationType::class)]
    public ?string $hsMeetingLocationType;

    #[Optional('hs_unique_id')]
    public ?string $hsUniqueID;

    #[Optional('hubspot_owner_id')]
    public ?string $hubspotOwnerID;

    /**
     * `new ExternalCalendarMeetingEventResponseProperties()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalCalendarMeetingEventResponseProperties::with(
     *   hsEngagementSource: ...,
     *   hsEngagementSourceID: ...,
     *   hsMeetingEndTime: ...,
     *   hsMeetingOutcome: ...,
     *   hsMeetingStartTime: ...,
     *   hsMeetingTitle: ...,
     *   hsTimestamp: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalCalendarMeetingEventResponseProperties)
     *   ->withHsEngagementSource(...)
     *   ->withHsEngagementSourceID(...)
     *   ->withHsMeetingEndTime(...)
     *   ->withHsMeetingOutcome(...)
     *   ->withHsMeetingStartTime(...)
     *   ->withHsMeetingTitle(...)
     *   ->withHsTimestamp(...)
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
     * @param HsEngagementSource|value-of<HsEngagementSource> $hsEngagementSource
     * @param list<string> $hsAttachmentIDs
     * @param list<string> $hsAttendeeOwnerIDs
     * @param HsMeetingLocationType|value-of<HsMeetingLocationType> $hsMeetingLocationType
     */
    public static function with(
        HsEngagementSource|string $hsEngagementSource,
        string $hsEngagementSourceID,
        \DateTimeInterface $hsMeetingEndTime,
        string $hsMeetingOutcome,
        \DateTimeInterface $hsMeetingStartTime,
        string $hsMeetingTitle,
        \DateTimeInterface $hsTimestamp,
        ?string $hsActivityType = null,
        ?array $hsAttachmentIDs = null,
        ?array $hsAttendeeOwnerIDs = null,
        ?string $hsIncludeDescriptionInReminder = null,
        ?string $hsInternalMeetingNotes = null,
        ?string $hsMeetingBody = null,
        ?string $hsMeetingExternalURL = null,
        ?string $hsMeetingLocation = null,
        HsMeetingLocationType|string|null $hsMeetingLocationType = null,
        ?string $hsUniqueID = null,
        ?string $hubspotOwnerID = null,
    ): self {
        $self = new self;

        $self['hsEngagementSource'] = $hsEngagementSource;
        $self['hsEngagementSourceID'] = $hsEngagementSourceID;
        $self['hsMeetingEndTime'] = $hsMeetingEndTime;
        $self['hsMeetingOutcome'] = $hsMeetingOutcome;
        $self['hsMeetingStartTime'] = $hsMeetingStartTime;
        $self['hsMeetingTitle'] = $hsMeetingTitle;
        $self['hsTimestamp'] = $hsTimestamp;

        null !== $hsActivityType && $self['hsActivityType'] = $hsActivityType;
        null !== $hsAttachmentIDs && $self['hsAttachmentIDs'] = $hsAttachmentIDs;
        null !== $hsAttendeeOwnerIDs && $self['hsAttendeeOwnerIDs'] = $hsAttendeeOwnerIDs;
        null !== $hsIncludeDescriptionInReminder && $self['hsIncludeDescriptionInReminder'] = $hsIncludeDescriptionInReminder;
        null !== $hsInternalMeetingNotes && $self['hsInternalMeetingNotes'] = $hsInternalMeetingNotes;
        null !== $hsMeetingBody && $self['hsMeetingBody'] = $hsMeetingBody;
        null !== $hsMeetingExternalURL && $self['hsMeetingExternalURL'] = $hsMeetingExternalURL;
        null !== $hsMeetingLocation && $self['hsMeetingLocation'] = $hsMeetingLocation;
        null !== $hsMeetingLocationType && $self['hsMeetingLocationType'] = $hsMeetingLocationType;
        null !== $hsUniqueID && $self['hsUniqueID'] = $hsUniqueID;
        null !== $hubspotOwnerID && $self['hubspotOwnerID'] = $hubspotOwnerID;

        return $self;
    }

    /**
     * @param HsEngagementSource|value-of<HsEngagementSource> $hsEngagementSource
     */
    public function withHsEngagementSource(
        HsEngagementSource|string $hsEngagementSource
    ): self {
        $self = clone $this;
        $self['hsEngagementSource'] = $hsEngagementSource;

        return $self;
    }

    public function withHsEngagementSourceID(string $hsEngagementSourceID): self
    {
        $self = clone $this;
        $self['hsEngagementSourceID'] = $hsEngagementSourceID;

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

    public function withHsIncludeDescriptionInReminder(
        string $hsIncludeDescriptionInReminder
    ): self {
        $self = clone $this;
        $self['hsIncludeDescriptionInReminder'] = $hsIncludeDescriptionInReminder;

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

    public function withHsMeetingExternalURL(string $hsMeetingExternalURL): self
    {
        $self = clone $this;
        $self['hsMeetingExternalURL'] = $hsMeetingExternalURL;

        return $self;
    }

    public function withHsMeetingLocation(string $hsMeetingLocation): self
    {
        $self = clone $this;
        $self['hsMeetingLocation'] = $hsMeetingLocation;

        return $self;
    }

    /**
     * @param HsMeetingLocationType|value-of<HsMeetingLocationType> $hsMeetingLocationType
     */
    public function withHsMeetingLocationType(
        HsMeetingLocationType|string $hsMeetingLocationType
    ): self {
        $self = clone $this;
        $self['hsMeetingLocationType'] = $hsMeetingLocationType;

        return $self;
    }

    public function withHsUniqueID(string $hsUniqueID): self
    {
        $self = clone $this;
        $self['hsUniqueID'] = $hsUniqueID;

        return $self;
    }

    public function withHubspotOwnerID(string $hubspotOwnerID): self
    {
        $self = clone $this;
        $self['hubspotOwnerID'] = $hubspotOwnerID;

        return $self;
    }
}
