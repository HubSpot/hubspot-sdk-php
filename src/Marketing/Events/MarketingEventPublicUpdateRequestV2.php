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
        $obj = new self;

        $obj['customProperties'] = $customProperties;

        null !== $endDateTime && $obj['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $obj['eventCancelled'] = $eventCancelled;
        null !== $eventDescription && $obj['eventDescription'] = $eventDescription;
        null !== $eventName && $obj['eventName'] = $eventName;
        null !== $eventOrganizer && $obj['eventOrganizer'] = $eventOrganizer;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $eventURL && $obj['eventURL'] = $eventURL;
        null !== $startDateTime && $obj['startDateTime'] = $startDateTime;

        return $obj;
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
        $obj = clone $this;
        $obj['customProperties'] = $customProperties;

        return $obj;
    }

    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $obj = clone $this;
        $obj['endDateTime'] = $endDateTime;

        return $obj;
    }

    public function withEventCancelled(bool $eventCancelled): self
    {
        $obj = clone $this;
        $obj['eventCancelled'] = $eventCancelled;

        return $obj;
    }

    public function withEventDescription(string $eventDescription): self
    {
        $obj = clone $this;
        $obj['eventDescription'] = $eventDescription;

        return $obj;
    }

    public function withEventName(string $eventName): self
    {
        $obj = clone $this;
        $obj['eventName'] = $eventName;

        return $obj;
    }

    public function withEventOrganizer(string $eventOrganizer): self
    {
        $obj = clone $this;
        $obj['eventOrganizer'] = $eventOrganizer;

        return $obj;
    }

    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    public function withEventURL(string $eventURL): self
    {
        $obj = clone $this;
        $obj['eventURL'] = $eventURL;

        return $obj;
    }

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $obj = clone $this;
        $obj['startDateTime'] = $startDateTime;

        return $obj;
    }
}
