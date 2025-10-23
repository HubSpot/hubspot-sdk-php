<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_event_subscriber = array{
 *   interactionDateTime: int, properties?: array<string, string>, vid?: int
 * }
 */
final class MarketingEventSubscriber implements BaseModel
{
    /** @use SdkModel<marketing_event_subscriber> */
    use SdkModel;

    /**
     * Timestamp in milliseconds at which the contact subscribed to the event.
     */
    #[Api]
    public int $interactionDateTime;

    /** @var array<string, string>|null $properties */
    #[Api(map: 'string', optional: true)]
    public ?array $properties;

    #[Api(optional: true)]
    public ?int $vid;

    /**
     * `new MarketingEventSubscriber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventSubscriber::with(interactionDateTime: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventSubscriber)->withInteractionDateTime(...)
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
     * @param array<string, string> $properties
     */
    public static function with(
        int $interactionDateTime,
        ?array $properties = null,
        ?int $vid = null
    ): self {
        $obj = new self;

        $obj->interactionDateTime = $interactionDateTime;

        null !== $properties && $obj->properties = $properties;
        null !== $vid && $obj->vid = $vid;

        return $obj;
    }

    /**
     * Timestamp in milliseconds at which the contact subscribed to the event.
     */
    public function withInteractionDateTime(int $interactionDateTime): self
    {
        $obj = clone $this;
        $obj->interactionDateTime = $interactionDateTime;

        return $obj;
    }

    /**
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    public function withVid(int $vid): self
    {
        $obj = clone $this;
        $obj->vid = $vid;

        return $obj;
    }
}
