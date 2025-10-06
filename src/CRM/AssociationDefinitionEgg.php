<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type association_definition_egg = array{
 *   fromObjectTypeID: string, toObjectTypeID: string, name?: string
 * }
 */
final class AssociationDefinitionEgg implements BaseModel
{
    /** @use SdkModel<association_definition_egg> */
    use SdkModel;

    #[Api('fromObjectTypeId')]
    public string $fromObjectTypeID;

    #[Api('toObjectTypeId')]
    public string $toObjectTypeID;

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

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
