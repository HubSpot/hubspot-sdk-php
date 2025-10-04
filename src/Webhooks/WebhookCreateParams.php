<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\WebhookCreateParams\EventType;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new WebhookCreateParams); // set properties as needed
 * $client->webhooks->create(...$params->toArray());
 * ```
 * Create an event subscription.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->webhooks->create(...$params->toArray());`
 *
 * @see HubspotSDK\Webhooks->create
 *
 * @phpstan-type webhook_create_params = array{
 *   eventType: EventType|value-of<EventType>,
 *   active?: bool,
 *   objectTypeID?: string,
 *   propertyName?: string,
 * }
 */
final class WebhookCreateParams implements BaseModel
{
    /** @use SdkModel<webhook_create_params> */
    use SdkModel;
    use SdkParams;

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
     * `new WebhookCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateParams::with(eventType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateParams)->withEventType(...)
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
