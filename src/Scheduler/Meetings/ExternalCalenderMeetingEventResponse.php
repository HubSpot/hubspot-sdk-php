<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventResponseProperties\HsEngagementSource;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventResponseProperties\HsMeetingLocationType;

/**
 * @phpstan-type ExternalCalenderMeetingEventResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   lastUpdatedAt: \DateTimeInterface,
 *   properties: ExternalCalendarMeetingEventResponseProperties,
 * }
 */
final class ExternalCalenderMeetingEventResponse implements BaseModel
{
    /** @use SdkModel<ExternalCalenderMeetingEventResponseShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public \DateTimeInterface $lastUpdatedAt;

    #[Api]
    public ExternalCalendarMeetingEventResponseProperties $properties;

    /**
     * `new ExternalCalenderMeetingEventResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalCalenderMeetingEventResponse::with(
     *   id: ..., createdAt: ..., lastUpdatedAt: ..., properties: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalCalenderMeetingEventResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withLastUpdatedAt(...)
     *   ->withProperties(...)
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
     * @param ExternalCalendarMeetingEventResponseProperties|array{
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
     * } $properties
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $lastUpdatedAt,
        ExternalCalendarMeetingEventResponseProperties|array $properties,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['lastUpdatedAt'] = $lastUpdatedAt;
        $obj['properties'] = $properties;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withLastUpdatedAt(\DateTimeInterface $lastUpdatedAt): self
    {
        $obj = clone $this;
        $obj['lastUpdatedAt'] = $lastUpdatedAt;

        return $obj;
    }

    /**
     * @param ExternalCalendarMeetingEventResponseProperties|array{
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
     * } $properties
     */
    public function withProperties(
        ExternalCalendarMeetingEventResponseProperties|array $properties
    ): self {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
