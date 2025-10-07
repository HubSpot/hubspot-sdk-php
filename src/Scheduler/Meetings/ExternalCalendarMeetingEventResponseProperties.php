<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventResponseProperties\HsEngagementSource;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventResponseProperties\HsMeetingLocationType;

/**
 * @phpstan-type external_calendar_meeting_event_response_properties = array{
 *   hsEngagementSource: value-of<HsEngagementSource>,
 *   hsEngagementSourceID: string,
 *   hsMeetingEndTime: \DateTimeInterface,
 *   hsMeetingOutcome: string,
 *   hsMeetingStartTime: \DateTimeInterface,
 *   hsMeetingTitle: string,
 *   hsTimestamp: \DateTimeInterface,
 *   hsActivityType?: string,
 *   hsAttachmentIDs?: list<string>,
 *   hsAttendeeOwnerIDs?: list<string>,
 *   hsIncludeDescriptionInReminder?: string,
 *   hsInternalMeetingNotes?: string,
 *   hsMeetingBody?: string,
 *   hsMeetingExternalURL?: string,
 *   hsMeetingLocation?: string,
 *   hsMeetingLocationType?: value-of<HsMeetingLocationType>,
 *   hsUniqueID?: string,
 *   hubspotOwnerID?: string,
 * }
 */
final class ExternalCalendarMeetingEventResponseProperties implements BaseModel
{
    /** @use SdkModel<external_calendar_meeting_event_response_properties> */
    use SdkModel;

    /** @var value-of<HsEngagementSource> $hsEngagementSource */
    #[Api('hs_engagement_source', enum: HsEngagementSource::class)]
    public string $hsEngagementSource;

    #[Api('hs_engagement_source_id')]
    public string $hsEngagementSourceID;

    #[Api('hs_meeting_end_time')]
    public \DateTimeInterface $hsMeetingEndTime;

    #[Api('hs_meeting_outcome')]
    public string $hsMeetingOutcome;

    #[Api('hs_meeting_start_time')]
    public \DateTimeInterface $hsMeetingStartTime;

    #[Api('hs_meeting_title')]
    public string $hsMeetingTitle;

    #[Api('hs_timestamp')]
    public \DateTimeInterface $hsTimestamp;

    #[Api('hs_activity_type', optional: true)]
    public ?string $hsActivityType;

    /** @var list<string>|null $hsAttachmentIDs */
    #[Api('hs_attachment_ids', list: 'string', optional: true)]
    public ?array $hsAttachmentIDs;

    /** @var list<string>|null $hsAttendeeOwnerIDs */
    #[Api('hs_attendee_owner_ids', list: 'string', optional: true)]
    public ?array $hsAttendeeOwnerIDs;

    #[Api('hs_include_description_in_reminder', optional: true)]
    public ?string $hsIncludeDescriptionInReminder;

    #[Api('hs_internal_meeting_notes', optional: true)]
    public ?string $hsInternalMeetingNotes;

    #[Api('hs_meeting_body', optional: true)]
    public ?string $hsMeetingBody;

    #[Api('hs_meeting_external_url', optional: true)]
    public ?string $hsMeetingExternalURL;

    #[Api('hs_meeting_location', optional: true)]
    public ?string $hsMeetingLocation;

    /** @var value-of<HsMeetingLocationType>|null $hsMeetingLocationType */
    #[Api(
        'hs_meeting_location_type',
        enum: HsMeetingLocationType::class,
        optional: true,
    )]
    public ?string $hsMeetingLocationType;

    #[Api('hs_unique_id', optional: true)]
    public ?string $hsUniqueID;

    #[Api('hubspot_owner_id', optional: true)]
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
        $obj = new self;

        $obj['hsEngagementSource'] = $hsEngagementSource;
        $obj->hsEngagementSourceID = $hsEngagementSourceID;
        $obj->hsMeetingEndTime = $hsMeetingEndTime;
        $obj->hsMeetingOutcome = $hsMeetingOutcome;
        $obj->hsMeetingStartTime = $hsMeetingStartTime;
        $obj->hsMeetingTitle = $hsMeetingTitle;
        $obj->hsTimestamp = $hsTimestamp;

        null !== $hsActivityType && $obj->hsActivityType = $hsActivityType;
        null !== $hsAttachmentIDs && $obj->hsAttachmentIDs = $hsAttachmentIDs;
        null !== $hsAttendeeOwnerIDs && $obj->hsAttendeeOwnerIDs = $hsAttendeeOwnerIDs;
        null !== $hsIncludeDescriptionInReminder && $obj->hsIncludeDescriptionInReminder = $hsIncludeDescriptionInReminder;
        null !== $hsInternalMeetingNotes && $obj->hsInternalMeetingNotes = $hsInternalMeetingNotes;
        null !== $hsMeetingBody && $obj->hsMeetingBody = $hsMeetingBody;
        null !== $hsMeetingExternalURL && $obj->hsMeetingExternalURL = $hsMeetingExternalURL;
        null !== $hsMeetingLocation && $obj->hsMeetingLocation = $hsMeetingLocation;
        null !== $hsMeetingLocationType && $obj['hsMeetingLocationType'] = $hsMeetingLocationType;
        null !== $hsUniqueID && $obj->hsUniqueID = $hsUniqueID;
        null !== $hubspotOwnerID && $obj->hubspotOwnerID = $hubspotOwnerID;

        return $obj;
    }

    /**
     * @param HsEngagementSource|value-of<HsEngagementSource> $hsEngagementSource
     */
    public function withHsEngagementSource(
        HsEngagementSource|string $hsEngagementSource
    ): self {
        $obj = clone $this;
        $obj['hsEngagementSource'] = $hsEngagementSource;

        return $obj;
    }

    public function withHsEngagementSourceID(string $hsEngagementSourceID): self
    {
        $obj = clone $this;
        $obj->hsEngagementSourceID = $hsEngagementSourceID;

        return $obj;
    }

    public function withHsMeetingEndTime(
        \DateTimeInterface $hsMeetingEndTime
    ): self {
        $obj = clone $this;
        $obj->hsMeetingEndTime = $hsMeetingEndTime;

        return $obj;
    }

    public function withHsMeetingOutcome(string $hsMeetingOutcome): self
    {
        $obj = clone $this;
        $obj->hsMeetingOutcome = $hsMeetingOutcome;

        return $obj;
    }

    public function withHsMeetingStartTime(
        \DateTimeInterface $hsMeetingStartTime
    ): self {
        $obj = clone $this;
        $obj->hsMeetingStartTime = $hsMeetingStartTime;

        return $obj;
    }

    public function withHsMeetingTitle(string $hsMeetingTitle): self
    {
        $obj = clone $this;
        $obj->hsMeetingTitle = $hsMeetingTitle;

        return $obj;
    }

    public function withHsTimestamp(\DateTimeInterface $hsTimestamp): self
    {
        $obj = clone $this;
        $obj->hsTimestamp = $hsTimestamp;

        return $obj;
    }

    public function withHsActivityType(string $hsActivityType): self
    {
        $obj = clone $this;
        $obj->hsActivityType = $hsActivityType;

        return $obj;
    }

    /**
     * @param list<string> $hsAttachmentIDs
     */
    public function withHsAttachmentIDs(array $hsAttachmentIDs): self
    {
        $obj = clone $this;
        $obj->hsAttachmentIDs = $hsAttachmentIDs;

        return $obj;
    }

    /**
     * @param list<string> $hsAttendeeOwnerIDs
     */
    public function withHsAttendeeOwnerIDs(array $hsAttendeeOwnerIDs): self
    {
        $obj = clone $this;
        $obj->hsAttendeeOwnerIDs = $hsAttendeeOwnerIDs;

        return $obj;
    }

    public function withHsIncludeDescriptionInReminder(
        string $hsIncludeDescriptionInReminder
    ): self {
        $obj = clone $this;
        $obj->hsIncludeDescriptionInReminder = $hsIncludeDescriptionInReminder;

        return $obj;
    }

    public function withHsInternalMeetingNotes(
        string $hsInternalMeetingNotes
    ): self {
        $obj = clone $this;
        $obj->hsInternalMeetingNotes = $hsInternalMeetingNotes;

        return $obj;
    }

    public function withHsMeetingBody(string $hsMeetingBody): self
    {
        $obj = clone $this;
        $obj->hsMeetingBody = $hsMeetingBody;

        return $obj;
    }

    public function withHsMeetingExternalURL(string $hsMeetingExternalURL): self
    {
        $obj = clone $this;
        $obj->hsMeetingExternalURL = $hsMeetingExternalURL;

        return $obj;
    }

    public function withHsMeetingLocation(string $hsMeetingLocation): self
    {
        $obj = clone $this;
        $obj->hsMeetingLocation = $hsMeetingLocation;

        return $obj;
    }

    /**
     * @param HsMeetingLocationType|value-of<HsMeetingLocationType> $hsMeetingLocationType
     */
    public function withHsMeetingLocationType(
        HsMeetingLocationType|string $hsMeetingLocationType
    ): self {
        $obj = clone $this;
        $obj['hsMeetingLocationType'] = $hsMeetingLocationType;

        return $obj;
    }

    public function withHsUniqueID(string $hsUniqueID): self
    {
        $obj = clone $this;
        $obj->hsUniqueID = $hsUniqueID;

        return $obj;
    }

    public function withHubspotOwnerID(string $hubspotOwnerID): self
    {
        $obj = clone $this;
        $obj->hubspotOwnerID = $hubspotOwnerID;

        return $obj;
    }
}
