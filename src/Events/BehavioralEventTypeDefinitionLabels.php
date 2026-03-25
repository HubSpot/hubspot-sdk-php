<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BehavioralEventTypeDefinitionLabelsShape = array{
 *   singular: string, plural?: string|null
 * }
 */
final class BehavioralEventTypeDefinitionLabels implements BaseModel
{
    /** @use SdkModel<BehavioralEventTypeDefinitionLabelsShape> */
    use SdkModel;

    #[Required]
    public string $singular;

    #[Optional]
    public ?string $plural;

    /**
     * `new BehavioralEventTypeDefinitionLabels()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BehavioralEventTypeDefinitionLabels::with(singular: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BehavioralEventTypeDefinitionLabels)->withSingular(...)
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
     */
    public static function with(string $singular, ?string $plural = null): self
    {
        $self = new self;

        $self['singular'] = $singular;

        null !== $plural && $self['plural'] = $plural;

        return $self;
    }

    public function withSingular(string $singular): self
    {
        $self = clone $this;
        $self['singular'] = $singular;

        return $self;
    }

    public function withPlural(string $plural): self
    {
        $self = clone $this;
        $self['plural'] = $plural;

        return $self;
    }
}
