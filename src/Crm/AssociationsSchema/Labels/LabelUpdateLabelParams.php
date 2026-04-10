<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema\Labels;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing label that describes the relationship between two specified CRM object types. This allows for modifications to existing association labels to better reflect the nature of the relationship.
 *
 * @see HubSpotSDK\Services\Crm\AssociationsSchema\LabelsService::updateLabel()
 *
 * @phpstan-type LabelUpdateLabelParamsShape = array{
 *   fromObjectType: string,
 *   associationTypeID: int,
 *   label: string,
 *   inverseLabel?: string|null,
 * }
 */
final class LabelUpdateLabelParams implements BaseModel
{
    /** @use SdkModel<LabelUpdateLabelParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /**
     * The unique identifier for the association type.
     */
    #[Required('associationTypeId')]
    public int $associationTypeID;

    /**
     * A descriptor that provides context about the relationship between associated records.
     */
    #[Required]
    public string $label;

    /**
     * An optional descriptor for the inverse relationship between associated records.
     */
    #[Optional]
    public ?string $inverseLabel;

    /**
     * `new LabelUpdateLabelParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelUpdateLabelParams::with(
     *   fromObjectType: ..., associationTypeID: ..., label: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelUpdateLabelParams)
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

    /**
     * The unique identifier for the association type.
     */
    public function withAssociationTypeID(int $associationTypeID): self
    {
        $self = clone $this;
        $self['associationTypeID'] = $associationTypeID;

        return $self;
    }

    /**
     * A descriptor that provides context about the relationship between associated records.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * An optional descriptor for the inverse relationship between associated records.
     */
    public function withInverseLabel(string $inverseLabel): self
    {
        $self = clone $this;
        $self['inverseLabel'] = $inverseLabel;

        return $self;
    }
}
