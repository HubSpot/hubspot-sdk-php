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
 *   hs_engagement_source: value-of<HsEngagementSource>,
 *   hs_engagement_source_id: string,
 *   hs_meeting_end_time: \DateTimeInterface,
 *   hs_meeting_outcome: string,
 *   hs_meeting_start_time: \DateTimeInterface,
 *   hs_meeting_title: string,
 *   hs_timestamp: \DateTimeInterface,
 *   hs_activity_type?: string|null,
 *   hs_attachment_ids?: list<string>|null,
 *   hs_attendee_owner_ids?: list<string>|null,
 *   hs_include_description_in_reminder?: string|null,
 *   hs_internal_meeting_notes?: string|null,
 *   hs_meeting_body?: string|null,
 *   hs_meeting_external_url?: string|null,
 *   hs_meeting_location?: string|null,
 *   hs_meeting_location_type?: value-of<HsMeetingLocationType>|null,
 *   hs_unique_id?: string|null,
 *   hubspot_owner_id?: string|null,
 * }
 */
final class ExternalCalendarMeetingEventResponseProperties implements BaseModel
{
    /** @use SdkModel<ExternalCalendarMeetingEventResponsePropertiesShape> */
    use SdkModel;

    /** @var value-of<HsEngagementSource> $hs_engagement_source */
    #[Required(enum: HsEngagementSource::class)]
    public string $hs_engagement_source;

    #[Required]
    public string $hs_engagement_source_id;

    #[Required]
    public \DateTimeInterface $hs_meeting_end_time;

    #[Required]
    public string $hs_meeting_outcome;

    #[Required]
    public \DateTimeInterface $hs_meeting_start_time;

    #[Required]
    public string $hs_meeting_title;

    #[Required]
    public \DateTimeInterface $hs_timestamp;

    #[Optional]
    public ?string $hs_activity_type;

    /** @var list<string>|null $hs_attachment_ids */
    #[Optional(list: 'string')]
    public ?array $hs_attachment_ids;

    /** @var list<string>|null $hs_attendee_owner_ids */
    #[Optional(list: 'string')]
    public ?array $hs_attendee_owner_ids;

    #[Optional]
    public ?string $hs_include_description_in_reminder;

    #[Optional]
    public ?string $hs_internal_meeting_notes;

    #[Optional]
    public ?string $hs_meeting_body;

    #[Optional]
    public ?string $hs_meeting_external_url;

    #[Optional]
    public ?string $hs_meeting_location;

    /** @var value-of<HsMeetingLocationType>|null $hs_meeting_location_type */
    #[Optional(enum: HsMeetingLocationType::class)]
    public ?string $hs_meeting_location_type;

    #[Optional]
    public ?string $hs_unique_id;

    #[Optional]
    public ?string $hubspot_owner_id;

    /**
     * `new ExternalCalendarMeetingEventResponseProperties()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalCalendarMeetingEventResponseProperties::with(
     *   hs_engagement_source: ...,
     *   hs_engagement_source_id: ...,
     *   hs_meeting_end_time: ...,
     *   hs_meeting_outcome: ...,
     *   hs_meeting_start_time: ...,
     *   hs_meeting_title: ...,
     *   hs_timestamp: ...,
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
     * @param HsEngagementSource|value-of<HsEngagementSource> $hs_engagement_source
     * @param list<string> $hs_attachment_ids
     * @param list<string> $hs_attendee_owner_ids
     * @param HsMeetingLocationType|value-of<HsMeetingLocationType> $hs_meeting_location_type
     */
    public static function with(
        HsEngagementSource|string $hs_engagement_source,
        string $hs_engagement_source_id,
        \DateTimeInterface $hs_meeting_end_time,
        string $hs_meeting_outcome,
        \DateTimeInterface $hs_meeting_start_time,
        string $hs_meeting_title,
        \DateTimeInterface $hs_timestamp,
        ?string $hs_activity_type = null,
        ?array $hs_attachment_ids = null,
        ?array $hs_attendee_owner_ids = null,
        ?string $hs_include_description_in_reminder = null,
        ?string $hs_internal_meeting_notes = null,
        ?string $hs_meeting_body = null,
        ?string $hs_meeting_external_url = null,
        ?string $hs_meeting_location = null,
        HsMeetingLocationType|string|null $hs_meeting_location_type = null,
        ?string $hs_unique_id = null,
        ?string $hubspot_owner_id = null,
    ): self {
        $obj = new self;

        $obj['hs_engagement_source'] = $hs_engagement_source;
        $obj['hs_engagement_source_id'] = $hs_engagement_source_id;
        $obj['hs_meeting_end_time'] = $hs_meeting_end_time;
        $obj['hs_meeting_outcome'] = $hs_meeting_outcome;
        $obj['hs_meeting_start_time'] = $hs_meeting_start_time;
        $obj['hs_meeting_title'] = $hs_meeting_title;
        $obj['hs_timestamp'] = $hs_timestamp;

        null !== $hs_activity_type && $obj['hs_activity_type'] = $hs_activity_type;
        null !== $hs_attachment_ids && $obj['hs_attachment_ids'] = $hs_attachment_ids;
        null !== $hs_attendee_owner_ids && $obj['hs_attendee_owner_ids'] = $hs_attendee_owner_ids;
        null !== $hs_include_description_in_reminder && $obj['hs_include_description_in_reminder'] = $hs_include_description_in_reminder;
        null !== $hs_internal_meeting_notes && $obj['hs_internal_meeting_notes'] = $hs_internal_meeting_notes;
        null !== $hs_meeting_body && $obj['hs_meeting_body'] = $hs_meeting_body;
        null !== $hs_meeting_external_url && $obj['hs_meeting_external_url'] = $hs_meeting_external_url;
        null !== $hs_meeting_location && $obj['hs_meeting_location'] = $hs_meeting_location;
        null !== $hs_meeting_location_type && $obj['hs_meeting_location_type'] = $hs_meeting_location_type;
        null !== $hs_unique_id && $obj['hs_unique_id'] = $hs_unique_id;
        null !== $hubspot_owner_id && $obj['hubspot_owner_id'] = $hubspot_owner_id;

        return $obj;
    }

    /**
     * @param HsEngagementSource|value-of<HsEngagementSource> $hsEngagementSource
     */
    public function withHsEngagementSource(
        HsEngagementSource|string $hsEngagementSource
    ): self {
        $obj = clone $this;
        $obj['hs_engagement_source'] = $hsEngagementSource;

        return $obj;
    }

    public function withHsEngagementSourceID(string $hsEngagementSourceID): self
    {
        $obj = clone $this;
        $obj['hs_engagement_source_id'] = $hsEngagementSourceID;

        return $obj;
    }

    public function withHsMeetingEndTime(
        \DateTimeInterface $hsMeetingEndTime
    ): self {
        $obj = clone $this;
        $obj['hs_meeting_end_time'] = $hsMeetingEndTime;

        return $obj;
    }

    public function withHsMeetingOutcome(string $hsMeetingOutcome): self
    {
        $obj = clone $this;
        $obj['hs_meeting_outcome'] = $hsMeetingOutcome;

        return $obj;
    }

    public function withHsMeetingStartTime(
        \DateTimeInterface $hsMeetingStartTime
    ): self {
        $obj = clone $this;
        $obj['hs_meeting_start_time'] = $hsMeetingStartTime;

        return $obj;
    }

    public function withHsMeetingTitle(string $hsMeetingTitle): self
    {
        $obj = clone $this;
        $obj['hs_meeting_title'] = $hsMeetingTitle;

        return $obj;
    }

    public function withHsTimestamp(\DateTimeInterface $hsTimestamp): self
    {
        $obj = clone $this;
        $obj['hs_timestamp'] = $hsTimestamp;

        return $obj;
    }

    public function withHsActivityType(string $hsActivityType): self
    {
        $obj = clone $this;
        $obj['hs_activity_type'] = $hsActivityType;

        return $obj;
    }

    /**
     * @param list<string> $hsAttachmentIDs
     */
    public function withHsAttachmentIDs(array $hsAttachmentIDs): self
    {
        $obj = clone $this;
        $obj['hs_attachment_ids'] = $hsAttachmentIDs;

        return $obj;
    }

    /**
     * @param list<string> $hsAttendeeOwnerIDs
     */
    public function withHsAttendeeOwnerIDs(array $hsAttendeeOwnerIDs): self
    {
        $obj = clone $this;
        $obj['hs_attendee_owner_ids'] = $hsAttendeeOwnerIDs;

        return $obj;
    }

    public function withHsIncludeDescriptionInReminder(
        string $hsIncludeDescriptionInReminder
    ): self {
        $obj = clone $this;
        $obj['hs_include_description_in_reminder'] = $hsIncludeDescriptionInReminder;

        return $obj;
    }

    public function withHsInternalMeetingNotes(
        string $hsInternalMeetingNotes
    ): self {
        $obj = clone $this;
        $obj['hs_internal_meeting_notes'] = $hsInternalMeetingNotes;

        return $obj;
    }

    public function withHsMeetingBody(string $hsMeetingBody): self
    {
        $obj = clone $this;
        $obj['hs_meeting_body'] = $hsMeetingBody;

        return $obj;
    }

    public function withHsMeetingExternalURL(string $hsMeetingExternalURL): self
    {
        $obj = clone $this;
        $obj['hs_meeting_external_url'] = $hsMeetingExternalURL;

        return $obj;
    }

    public function withHsMeetingLocation(string $hsMeetingLocation): self
    {
        $obj = clone $this;
        $obj['hs_meeting_location'] = $hsMeetingLocation;

        return $obj;
    }

    /**
     * @param HsMeetingLocationType|value-of<HsMeetingLocationType> $hsMeetingLocationType
     */
    public function withHsMeetingLocationType(
        HsMeetingLocationType|string $hsMeetingLocationType
    ): self {
        $obj = clone $this;
        $obj['hs_meeting_location_type'] = $hsMeetingLocationType;

        return $obj;
    }

    public function withHsUniqueID(string $hsUniqueID): self
    {
        $obj = clone $this;
        $obj['hs_unique_id'] = $hsUniqueID;

        return $obj;
    }

    public function withHubspotOwnerID(string $hubspotOwnerID): self
    {
        $obj = clone $this;
        $obj['hubspot_owner_id'] = $hubspotOwnerID;

        return $obj;
    }
}
