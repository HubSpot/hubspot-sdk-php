<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PropertyValueShape from \HubspotSDK\Marketing\Events\PropertyValue
 *
 * @phpstan-type MarketingEventPublicUpdateRequestFullV2Shape = array{
 *   customProperties: list<PropertyValueShape>,
 *   objectID: string,
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
final class MarketingEventPublicUpdateRequestFullV2 implements BaseModel
{
    /** @use SdkModel<MarketingEventPublicUpdateRequestFullV2Shape> */
    use SdkModel;

    /** @var list<PropertyValue> $customProperties */
    #[Required(list: PropertyValue::class)]
    public array $customProperties;

    #[Required('objectId')]
    public string $objectID;

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
     * `new MarketingEventPublicUpdateRequestFullV2()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventPublicUpdateRequestFullV2::with(
     *   customProperties: ..., objectID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventPublicUpdateRequestFullV2)
     *   ->withCustomProperties(...)
     *   ->withObjectID(...)
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
     * @param list<PropertyValueShape> $customProperties
     */
    public static function with(
        array $customProperties,
        string $objectID,
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
        $self['objectID'] = $objectID;

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
     * @param list<PropertyValueShape> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

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
