<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AssociationDefinitionEggShape = array{
 *   fromObjectTypeID: string, toObjectTypeID: string, name?: string|null
 * }
 */
final class AssociationDefinitionEgg implements BaseModel
{
    /** @use SdkModel<AssociationDefinitionEggShape> */
    use SdkModel;

    #[Required('fromObjectTypeId')]
    public string $fromObjectTypeID;

    #[Required('toObjectTypeId')]
    public string $toObjectTypeID;

    #[Optional]
    public ?string $name;

    /**
     * `new AssociationDefinitionEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDefinitionEgg::with(fromObjectTypeID: ..., toObjectTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDefinitionEgg)
     *   ->withFromObjectTypeID(...)
     *   ->withToObjectTypeID(...)
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
    public static function with(
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?string $name = null
    ): self {
        $self = new self;

        $self['fromObjectTypeID'] = $fromObjectTypeID;
        $self['toObjectTypeID'] = $toObjectTypeID;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
