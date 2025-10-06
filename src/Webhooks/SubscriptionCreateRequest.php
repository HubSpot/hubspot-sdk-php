<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\SubscriptionCreateRequest\EventType;

/**
 * @phpstan-type subscription_create_request = array{
 *   eventType: value-of<EventType>,
 *   active?: bool,
 *   objectTypeID?: string,
 *   propertyName?: string,
 * }
 */
final class SubscriptionCreateRequest implements BaseModel
{
    /** @use SdkModel<subscription_create_request> */
    use SdkModel;

    /** @var value-of<EventType> $eventType */
    #[Api(enum: EventType::class)]
    public string $eventType;

    #[Api(optional: true)]
    public ?bool $active;

    #[Api('objectTypeId', optional: true)]
    public ?string $objectTypeID;

    #[Api(optional: true)]
    public ?string $propertyName;

    /**
     * `new SubscriptionCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionCreateRequest::with(eventType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionCreateRequest)->withEventType(...)
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
     * @param EventType|value-of<EventType> $eventType
     */
    public static function with(
        EventType|string $eventType,
        ?bool $active = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
    ): self {
        $obj = new self;

        $obj['eventType'] = $eventType;

        null !== $active && $obj->active = $active;
        null !== $objectTypeID && $obj->objectTypeID = $objectTypeID;
        null !== $propertyName && $obj->propertyName = $propertyName;

        return $obj;
    }

    /**
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }
}
