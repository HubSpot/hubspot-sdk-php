<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_event_public_update_request_v2 = array{
 *   customProperties: list<PropertyValue>,
 *   endDateTime?: \DateTimeInterface,
 *   eventCancelled?: bool,
 *   eventDescription?: string,
 *   eventName?: string,
 *   eventOrganizer?: string,
 *   eventType?: string,
 *   eventURL?: string,
 *   startDateTime?: \DateTimeInterface,
 * }
 */
final class MarketingEventPublicUpdateRequestV2 implements BaseModel
{
    /** @use SdkModel<marketing_event_public_update_request_v2> */
    use SdkModel;

    /** @var list<PropertyValue> $customProperties */
    #[Api(list: PropertyValue::class)]
    public array $customProperties;

    #[Api(optional: true)]
    public ?\DateTimeInterface $endDateTime;

    #[Api(optional: true)]
    public ?bool $eventCancelled;

    #[Api(optional: true)]
    public ?string $eventDescription;

    #[Api(optional: true)]
    public ?string $eventName;

    #[Api(optional: true)]
    public ?string $eventOrganizer;

    #[Api(optional: true)]
    public ?string $eventType;

    #[Api('eventUrl', optional: true)]
    public ?string $eventURL;

    #[Api(optional: true)]
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
     * @param list<PropertyValue> $customProperties
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

        $obj->customProperties = $customProperties;

        null !== $endDateTime && $obj->endDateTime = $endDateTime;
        null !== $eventCancelled && $obj->eventCancelled = $eventCancelled;
        null !== $eventDescription && $obj->eventDescription = $eventDescription;
        null !== $eventName && $obj->eventName = $eventName;
        null !== $eventOrganizer && $obj->eventOrganizer = $eventOrganizer;
        null !== $eventType && $obj->eventType = $eventType;
        null !== $eventURL && $obj->eventURL = $eventURL;
        null !== $startDateTime && $obj->startDateTime = $startDateTime;

        return $obj;
    }

    /**
     * @param list<PropertyValue> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj->customProperties = $customProperties;

        return $obj;
    }

    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $obj = clone $this;
        $obj->endDateTime = $endDateTime;

        return $obj;
    }

    public function withEventCancelled(bool $eventCancelled): self
    {
        $obj = clone $this;
        $obj->eventCancelled = $eventCancelled;

        return $obj;
    }

    public function withEventDescription(string $eventDescription): self
    {
        $obj = clone $this;
        $obj->eventDescription = $eventDescription;

        return $obj;
    }

    public function withEventName(string $eventName): self
    {
        $obj = clone $this;
        $obj->eventName = $eventName;

        return $obj;
    }

    public function withEventOrganizer(string $eventOrganizer): self
    {
        $obj = clone $this;
        $obj->eventOrganizer = $eventOrganizer;

        return $obj;
    }

    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj->eventType = $eventType;

        return $obj;
    }

    public function withEventURL(string $eventURL): self
    {
        $obj = clone $this;
        $obj->eventURL = $eventURL;

        return $obj;
    }

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $obj = clone $this;
        $obj->startDateTime = $startDateTime;

        return $obj;
    }
}
