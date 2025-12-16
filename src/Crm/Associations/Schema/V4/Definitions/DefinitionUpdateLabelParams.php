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
 *   associationTypeID: int,
 *   label: string,
 *   inverseLabel?: string|null,
 * }
 */
final class DefinitionUpdateLabelParams implements BaseModel
{
    /** @use SdkModel<DefinitionUpdateLabelParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    #[Required('associationTypeId')]
    public int $associationTypeID;

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
     *   fromObjectType: ..., associationTypeID: ..., label: ...
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
        int $associationTypeID,
        string $label,
        ?string $inverseLabel = null,
    ): self {
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;
        $self['associationTypeID'] = $associationTypeID;
        $self['label'] = $label;

        null !== $inverseLabel && $self['inverseLabel'] = $inverseLabel;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $self = clone $this;
        $self['associationTypeID'] = $associationTypeID;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withInverseLabel(string $inverseLabel): self
    {
        $self = clone $this;
        $self['inverseLabel'] = $inverseLabel;

        return $self;
    }
}
