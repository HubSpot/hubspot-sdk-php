<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4\Definitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a user defined association definition.
 *
 * @see HubspotSDK\CRM\Associations\Schema\V4\Definitions->update
 *
 * @phpstan-type DefinitionUpdateParamsShape = array{
 *   fromObjectType: string,
 *   associationTypeID: int,
 *   label: string,
 *   inverseLabel?: string,
 * }
 */
final class DefinitionUpdateParams implements BaseModel
{
    /** @use SdkModel<DefinitionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    #[Api('associationTypeId')]
    public int $associationTypeID;

    #[Api]
    public string $label;

    #[Api(optional: true)]
    public ?string $inverseLabel;

    /**
     * `new DefinitionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionUpdateParams::with(
     *   fromObjectType: ..., associationTypeID: ..., label: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionUpdateParams)
     *   ->withFromObjectType(...)
     *   ->withAssociationTypeID(...)
     *   ->withLabel(...)
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
        string $fromObjectType,
        int $associationTypeID,
        string $label,
        ?string $inverseLabel = null,
    ): self {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->associationTypeID = $associationTypeID;
        $obj->label = $label;

        null !== $inverseLabel && $obj->inverseLabel = $inverseLabel;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $obj = clone $this;
        $obj->associationTypeID = $associationTypeID;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withInverseLabel(string $inverseLabel): self
    {
        $obj = clone $this;
        $obj->inverseLabel = $inverseLabel;

        return $obj;
    }
}
