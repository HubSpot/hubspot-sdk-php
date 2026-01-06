<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public \DateTimeInterface $lastUpdatedAt;

    #[Required]
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
     *   hsEngagementSource: value-of<HsEngagementSource>,
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
     *   hsMeetingLocationType?: value-of<HsMeetingLocationType>|null,
     *   hsUniqueID?: string|null,
     *   hubspotOwnerID?: string|null,
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
     *   hsEngagementSource: value-of<HsEngagementSource>,
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
     *   hsMeetingLocationType?: value-of<HsMeetingLocationType>|null,
     *   hsUniqueID?: string|null,
     *   hubspotOwnerID?: string|null,
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
