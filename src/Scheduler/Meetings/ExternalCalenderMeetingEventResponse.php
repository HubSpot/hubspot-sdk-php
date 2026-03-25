<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalCalendarMeetingEventResponsePropertiesShape from \HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventResponseProperties
 *
 * @phpstan-type ExternalCalenderMeetingEventResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   lastUpdatedAt: \DateTimeInterface,
 *   properties: ExternalCalendarMeetingEventResponseProperties|ExternalCalendarMeetingEventResponsePropertiesShape,
 * }
 */
final class ExternalCalenderMeetingEventResponse implements BaseModel
{
    /** @use SdkModel<ExternalCalenderMeetingEventResponseShape> */
    use SdkModel;

    /**
     * The unique identifier for the meeting event.
     */
    #[Required]
    public string $id;

    /**
     * The date and time when the meeting event was initially created, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The date and time when the meeting event was last updated, in ISO 8601 format.
     */
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
     * @param ExternalCalendarMeetingEventResponseProperties|ExternalCalendarMeetingEventResponsePropertiesShape $properties
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

    /**
     * The unique identifier for the meeting event.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The date and time when the meeting event was initially created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The date and time when the meeting event was last updated, in ISO 8601 format.
     */
    public function withLastUpdatedAt(\DateTimeInterface $lastUpdatedAt): self
    {
        $self = clone $this;
        $self['lastUpdatedAt'] = $lastUpdatedAt;

        return $self;
    }

    /**
     * @param ExternalCalendarMeetingEventResponseProperties|ExternalCalendarMeetingEventResponsePropertiesShape $properties
     */
    public function withProperties(
        ExternalCalendarMeetingEventResponseProperties|array $properties
    ): self {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
