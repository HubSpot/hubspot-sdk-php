<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectTypeDefinitionLabelsShape = array{
 *   plural?: string|null, singular?: string|null
 * }
 */
final class ObjectTypeDefinitionLabels implements BaseModel
{
    /** @use SdkModel<ObjectTypeDefinitionLabelsShape> */
    use SdkModel;

    #[Optional]
    public ?string $plural;

    #[Optional]
    public ?string $singular;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $plural = null,
        ?string $singular = null
    ): self {
        $self = new self;

        null !== $plural && $self['plural'] = $plural;
        null !== $singular && $self['singular'] = $singular;

        return $self;
    }

    public function withPlural(string $plural): self
    {
        $self = clone $this;
        $self['plural'] = $plural;

        return $self;
    }

    public function withSingular(string $singular): self
    {
        $self = clone $this;
        $self['singular'] = $singular;

        return $self;
    }
}
