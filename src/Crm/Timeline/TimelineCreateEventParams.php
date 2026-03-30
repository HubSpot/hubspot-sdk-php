<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Send a single instance of event data to a specified event type.
 *
 * @see HubspotSDK\Services\Crm\TimelineService::createEvent()
 *
 * @phpstan-import-type TimelineEventIFrameShape from \HubspotSDK\Crm\Timeline\TimelineEventIFrame
 *
 * @phpstan-type TimelineCreateEventParamsShape = array{
 *   id: string,
 *   eventTypeName: string,
 *   properties: array<string,string>,
 *   domain?: string|null,
 *   email?: string|null,
 *   extraData?: mixed,
 *   objectID?: string|null,
 *   objectTypeFullyQualifiedName?: string|null,
 *   timelineIFrame?: null|TimelineEventIFrame|TimelineEventIFrameShape,
 *   timestamp?: \DateTimeInterface|null,
 *   utk?: string|null,
 * }
 */
final class TimelineCreateEventParams implements BaseModel
{
    /** @use SdkModel<TimelineCreateEventParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    #[Required]
    public string $eventTypeName;

    /** @var array<string,string> $properties */
    #[Required(map: 'string')]
    public array $properties;

    #[Optional]
    public ?string $domain;

    #[Optional]
    public ?string $email;

    #[Optional]
    public mixed $extraData;

    #[Optional('objectId')]
    public ?string $objectID;

    #[Optional]
    public ?string $objectTypeFullyQualifiedName;

    #[Optional]
    public ?TimelineEventIFrame $timelineIFrame;

    #[Optional]
    public ?\DateTimeInterface $timestamp;

    #[Optional]
    public ?string $utk;

    /**
     * `new TimelineCreateEventParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineCreateEventParams::with(id: ..., eventTypeName: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineCreateEventParams)
     *   ->withID(...)
     *   ->withEventTypeName(...)
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
     * @param array<string,string> $properties
     * @param TimelineEventIFrame|TimelineEventIFrameShape|null $timelineIFrame
     */
    public static function with(
        string $id,
        string $eventTypeName,
        array $properties,
        ?string $domain = null,
        ?string $email = null,
        mixed $extraData = null,
        ?string $objectID = null,
        ?string $objectTypeFullyQualifiedName = null,
        TimelineEventIFrame|array|null $timelineIFrame = null,
        ?\DateTimeInterface $timestamp = null,
        ?string $utk = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['eventTypeName'] = $eventTypeName;
        $self['properties'] = $properties;

        null !== $domain && $self['domain'] = $domain;
        null !== $email && $self['email'] = $email;
        null !== $extraData && $self['extraData'] = $extraData;
        null !== $objectID && $self['objectID'] = $objectID;
        null !== $objectTypeFullyQualifiedName && $self['objectTypeFullyQualifiedName'] = $objectTypeFullyQualifiedName;
        null !== $timelineIFrame && $self['timelineIFrame'] = $timelineIFrame;
        null !== $timestamp && $self['timestamp'] = $timestamp;
        null !== $utk && $self['utk'] = $utk;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEventTypeName(string $eventTypeName): self
    {
        $self = clone $this;
        $self['eventTypeName'] = $eventTypeName;

        return $self;
    }

    /**
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withExtraData(mixed $extraData): self
    {
        $self = clone $this;
        $self['extraData'] = $extraData;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    public function withObjectTypeFullyQualifiedName(
        string $objectTypeFullyQualifiedName
    ): self {
        $self = clone $this;
        $self['objectTypeFullyQualifiedName'] = $objectTypeFullyQualifiedName;

        return $self;
    }

    /**
     * @param TimelineEventIFrame|TimelineEventIFrameShape $timelineIFrame
     */
    public function withTimelineIFrame(
        TimelineEventIFrame|array $timelineIFrame
    ): self {
        $self = clone $this;
        $self['timelineIFrame'] = $timelineIFrame;

        return $self;
    }

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withUtk(string $utk): self
    {
        $self = clone $this;
        $self['utk'] = $utk;

        return $self;
    }
}
