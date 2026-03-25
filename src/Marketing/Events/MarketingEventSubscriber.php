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

    /**
     * The key-value set of the properties of the contact.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * The ID of the contact in HubSpot.
     */
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
        $self = new self;

        $self['interactionDateTime'] = $interactionDateTime;
        $self['properties'] = $properties;
        $self['vid'] = $vid;

        return $self;
    }

    /**
     * Timestamp in milliseconds at which the contact subscribed to the event.
     */
    public function withInteractionDateTime(int $interactionDateTime): self
    {
        $self = clone $this;
        $self['interactionDateTime'] = $interactionDateTime;

        return $self;
    }

    /**
     * The key-value set of the properties of the contact.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The ID of the contact in HubSpot.
     */
    public function withVid(int $vid): self
    {
        $self = clone $this;
        $self['vid'] = $vid;

        return $self;
    }
}
