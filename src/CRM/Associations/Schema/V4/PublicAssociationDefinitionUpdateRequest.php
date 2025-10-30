<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssociationDefinitionUpdateRequestShape = array{
 *   associationTypeID: int, label: string, inverseLabel?: string
 * }
 */
final class PublicAssociationDefinitionUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionUpdateRequestShape> */
    use SdkModel;

    #[Api('associationTypeId')]
    public int $associationTypeID;

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
     *   associationTypeID: ..., label: ...
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
        int $associationTypeID,
        string $label,
        ?string $inverseLabel = null
    ): self {
        $obj = new self;

        $obj->associationTypeID = $associationTypeID;
        $obj->label = $label;

        null !== $inverseLabel && $obj->inverseLabel = $inverseLabel;

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
