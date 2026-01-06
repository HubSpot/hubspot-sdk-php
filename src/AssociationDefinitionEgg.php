<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
        $obj = new self;

        $obj['fromObjectTypeID'] = $fromObjectTypeID;
        $obj['toObjectTypeID'] = $toObjectTypeID;

        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj['fromObjectTypeID'] = $fromObjectTypeID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj['toObjectTypeID'] = $toObjectTypeID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
