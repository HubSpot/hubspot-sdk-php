<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionCreateParams\EventType;

/**
 * Create new event subscription for the specified app.
 *
 * @see HubspotSDK\Webhooks\Subscriptions->create
 *
 * @phpstan-type SubscriptionCreateParamsShape = array{
 *   eventType: EventType|value-of<EventType>,
 *   active?: bool,
 *   objectTypeID?: string,
 *   propertyName?: string,
 * }
 */
final class SubscriptionCreateParams implements BaseModel
{
    /** @use SdkModel<SubscriptionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     *
     * @var value-of<EventType> $eventType
     */
    #[Api(enum: EventType::class)]
    public string $eventType;

    /**
     * Determines if the subscription is active or paused. Defaults to false.
     */
    #[Api(optional: true)]
    public ?bool $active;

    #[Api('objectTypeId', optional: true)]
    public ?string $objectTypeID;

    /**
     * The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     */
    #[Api(optional: true)]
    public ?string $propertyName;

    /**
     * `new SubscriptionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionCreateParams::with(eventType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionCreateParams)->withEventType(...)
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
     * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * Determines if the subscription is active or paused. Defaults to false.
     */
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

    /**
     * The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     */
    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }
}
