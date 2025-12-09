<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventSubscriberShape = array{
 *   interactionDateTime: int, properties: array<string,string>, vid: int
 * }
 */
final class MarketingEventSubscriber implements BaseModel
{
    /** @use SdkModel<MarketingEventSubscriberShape> */
    use SdkModel;

    /**
     * Timestamp in milliseconds at which the contact subscribed to the event.
     */
    #[Required]
    public int $interactionDateTime;

    /** @var array<string,string> $properties */
    #[Required(map: 'string')]
    public array $properties;

    #[Required]
    public int $vid;

    /**
     * `new MarketingEventSubscriber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventSubscriber::with(
     *   interactionDateTime: ..., properties: ..., vid: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventSubscriber)
     *   ->withInteractionDateTime(...)
     *   ->withProperties(...)
     *   ->withVid(...)
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
     */
    public static function with(
        int $interactionDateTime,
        array $properties,
        int $vid
    ): self {
        $obj = new self;

        $obj['interactionDateTime'] = $interactionDateTime;
        $obj['properties'] = $properties;
        $obj['vid'] = $vid;

        return $obj;
    }

    /**
     * Timestamp in milliseconds at which the contact subscribed to the event.
     */
    public function withInteractionDateTime(int $interactionDateTime): self
    {
        $obj = clone $this;
        $obj['interactionDateTime'] = $interactionDateTime;

        return $obj;
    }

    /**
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    public function withVid(int $vid): self
    {
        $obj = clone $this;
        $obj['vid'] = $vid;

        return $obj;
    }
}
