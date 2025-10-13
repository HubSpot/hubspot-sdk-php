<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Defines an association between two object types.
 *
 * @phpstan-type association_definition_egg = array{
 *   fromObjectTypeID: string, toObjectTypeID: string, name?: string
 * }
 */
final class AssociationDefinitionEgg implements BaseModel
{
    /** @use SdkModel<association_definition_egg> */
    use SdkModel;

    /**
     * ID of the primary object type to link from.
     */
    #[Api('fromObjectTypeId')]
    public string $fromObjectTypeID;

    /**
     * ID of the target object type to link to.
     */
    #[Api('toObjectTypeId')]
    public string $toObjectTypeID;

    /**
     * A unique name for this association.
     */
    #[Api(optional: true)]
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

        $obj->fromObjectTypeID = $fromObjectTypeID;
        $obj->toObjectTypeID = $toObjectTypeID;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * ID of the primary object type to link from.
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }

    /**
     * ID of the target object type to link to.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    /**
     * A unique name for this association.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
