<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AssociationDefinitionEggShape = array{
 *   fromObjectTypeId: string, toObjectTypeId: string, name?: string|null
 * }
 */
final class AssociationDefinitionEgg implements BaseModel
{
    /** @use SdkModel<AssociationDefinitionEggShape> */
    use SdkModel;

    #[Api]
    public string $fromObjectTypeId;

    #[Api]
    public string $toObjectTypeId;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new AssociationDefinitionEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDefinitionEgg::with(fromObjectTypeId: ..., toObjectTypeId: ...)
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
        string $fromObjectTypeId,
        string $toObjectTypeId,
        ?string $name = null
    ): self {
        $obj = new self;

        $obj['fromObjectTypeId'] = $fromObjectTypeId;
        $obj['toObjectTypeId'] = $toObjectTypeId;

        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj['fromObjectTypeId'] = $fromObjectTypeID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj['toObjectTypeId'] = $toObjectTypeID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
