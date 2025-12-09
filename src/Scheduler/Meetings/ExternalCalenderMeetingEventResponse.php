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
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['lastUpdatedAt'] = $lastUpdatedAt;
        $self['properties'] = $properties;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withLastUpdatedAt(\DateTimeInterface $lastUpdatedAt): self
    {
        $self = clone $this;
        $self['lastUpdatedAt'] = $lastUpdatedAt;

        return $self;
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
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
