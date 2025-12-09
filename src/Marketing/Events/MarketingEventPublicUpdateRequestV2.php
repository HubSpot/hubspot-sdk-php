<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\PropertyValue\DataSensitivity;
use HubspotSDK\Marketing\Events\PropertyValue\Source;

/**
 * @phpstan-type MarketingEventPublicUpdateRequestV2Shape = array{
 *   customProperties: list<PropertyValue>,
 *   endDateTime?: \DateTimeInterface|null,
 *   eventCancelled?: bool|null,
 *   eventDescription?: string|null,
 *   eventName?: string|null,
 *   eventOrganizer?: string|null,
 *   eventType?: string|null,
 *   eventURL?: string|null,
 *   startDateTime?: \DateTimeInterface|null,
 * }
 */
final class MarketingEventPublicUpdateRequestV2 implements BaseModel
{
    /** @use SdkModel<MarketingEventPublicUpdateRequestV2Shape> */
    use SdkModel;

    /** @var list<PropertyValue> $customProperties */
    #[Required(list: PropertyValue::class)]
    public array $customProperties;

    #[Optional]
    public ?\DateTimeInterface $endDateTime;

    #[Optional]
    public ?bool $eventCancelled;

    #[Optional]
    public ?string $eventDescription;

    #[Optional]
    public ?string $eventName;

    #[Optional]
    public ?string $eventOrganizer;

    #[Optional]
    public ?string $eventType;

    #[Optional('eventUrl')]
    public ?string $eventURL;

    #[Optional]
    public ?\DateTimeInterface $startDateTime;

    /**
     * `new MarketingEventPublicUpdateRequestV2()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventPublicUpdateRequestV2::with(customProperties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventPublicUpdateRequestV2)->withCustomProperties(...)
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
     * @param list<PropertyValue|array{
     *   dataSensitivity: value-of<DataSensitivity>,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: value-of<Source>,
     *   sourceID: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserID: int,
     *   useTimestampAsPersistenceTimestamp: bool,
     *   value: string,
     * }> $customProperties
     */
    public static function with(
        array $customProperties,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?string $eventDescription = null,
        ?string $eventName = null,
        ?string $eventOrganizer = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $self = new self;

        $self['customProperties'] = $customProperties;

        null !== $endDateTime && $self['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $self['eventCancelled'] = $eventCancelled;
        null !== $eventDescription && $self['eventDescription'] = $eventDescription;
        null !== $eventName && $self['eventName'] = $eventName;
        null !== $eventOrganizer && $self['eventOrganizer'] = $eventOrganizer;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $eventURL && $self['eventURL'] = $eventURL;
        null !== $startDateTime && $self['startDateTime'] = $startDateTime;

        return $self;
    }

    /**
     * @param list<PropertyValue|array{
     *   dataSensitivity: value-of<DataSensitivity>,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: value-of<Source>,
     *   sourceID: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserID: int,
     *   useTimestampAsPersistenceTimestamp: bool,
     *   value: string,
     * }> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

        return $self;
    }

    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $self = clone $this;
        $self['endDateTime'] = $endDateTime;

        return $self;
    }

    public function withEventCancelled(bool $eventCancelled): self
    {
        $self = clone $this;
        $self['eventCancelled'] = $eventCancelled;

        return $self;
    }

    public function withEventDescription(string $eventDescription): self
    {
        $self = clone $this;
        $self['eventDescription'] = $eventDescription;

        return $self;
    }

    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }

    public function withEventOrganizer(string $eventOrganizer): self
    {
        $self = clone $this;
        $self['eventOrganizer'] = $eventOrganizer;

        return $self;
    }

    public function withEventType(string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    public function withEventURL(string $eventURL): self
    {
        $self = clone $this;
        $self['eventURL'] = $eventURL;

        return $self;
    }

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $self = clone $this;
        $self['startDateTime'] = $startDateTime;

        return $self;
    }
}
