<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssociationDefinitionUpdateRequestShape = array{
 *   associationTypeId: int, label: string, inverseLabel?: string|null
 * }
 */
final class PublicAssociationDefinitionUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionUpdateRequestShape> */
    use SdkModel;

    #[Api]
    public int $associationTypeId;

    #[Api]
    public string $label;

    #[Api(optional: true)]
    public ?string $inverseLabel;

    /**
     * `new PublicAssociationDefinitionUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionUpdateRequest::with(
     *   associationTypeId: ..., label: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationDefinitionUpdateRequest)
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
        int $associationTypeId,
        string $label,
        ?string $inverseLabel = null
    ): self {
        $obj = new self;

        $obj->associationTypeId = $associationTypeId;
        $obj->label = $label;

        null !== $inverseLabel && $obj->inverseLabel = $inverseLabel;

        return $obj;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $obj = clone $this;
        $obj->associationTypeId = $associationTypeID;

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
