<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $lastUpdatedAt,
        ExternalCalendarMeetingEventResponseProperties $properties,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->lastUpdatedAt = $lastUpdatedAt;
        $obj->properties = $properties;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withLastUpdatedAt(\DateTimeInterface $lastUpdatedAt): self
    {
        $obj = clone $this;
        $obj->lastUpdatedAt = $lastUpdatedAt;

        return $obj;
    }

    public function withProperties(
        ExternalCalendarMeetingEventResponseProperties $properties
    ): self {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
