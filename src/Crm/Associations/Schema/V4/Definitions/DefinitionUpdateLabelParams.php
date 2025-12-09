<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Associations\Schema\V4\DefinitionsService::updateLabel()
 *
 * @phpstan-type DefinitionUpdateLabelParamsShape = array{
 *   fromObjectType: string,
 *   associationTypeId: int,
 *   label: string,
 *   inverseLabel?: string,
 * }
 */
final class DefinitionUpdateLabelParams implements BaseModel
{
    /** @use SdkModel<DefinitionUpdateLabelParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    #[Required]
    public int $associationTypeId;

    #[Required]
    public string $label;

    #[Optional]
    public ?string $inverseLabel;

    /**
     * `new DefinitionUpdateLabelParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionUpdateLabelParams::with(
     *   fromObjectType: ..., associationTypeId: ..., label: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionUpdateLabelParams)
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
        int $associationTypeId,
        string $label,
        ?string $inverseLabel = null,
    ): self {
        $obj = new self;

        $obj['fromObjectType'] = $fromObjectType;
        $obj['associationTypeId'] = $associationTypeId;
        $obj['label'] = $label;

        null !== $inverseLabel && $obj['inverseLabel'] = $inverseLabel;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj['fromObjectType'] = $fromObjectType;

        return $obj;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $obj = clone $this;
        $obj['associationTypeId'] = $associationTypeID;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withInverseLabel(string $inverseLabel): self
    {
        $obj = clone $this;
        $obj['inverseLabel'] = $inverseLabel;

        return $obj;
    }
}
