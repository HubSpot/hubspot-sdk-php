<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema\Labels;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new label that describes the relationship between two specified CRM object types. This can help in categorizing and managing associations more effectively.
 *
 * @see HubspotSDK\Services\Crm\AssociationsSchema\LabelsService::createLabel()
 *
 * @phpstan-type LabelCreateLabelParamsShape = array{
 *   fromObjectType: string,
 *   label: string,
 *   name: string,
 *   inverseLabel?: string|null,
 * }
 */
final class LabelCreateLabelParams implements BaseModel
{
    /** @use SdkModel<LabelCreateLabelParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /**
     * A descriptor that provides context about the relationship between two associated CRM objects.
     */
    #[Required]
    public string $label;

    /**
     * The unique identifier for the association definition.
     */
    #[Required]
    public string $name;

    /**
     * An optional descriptor that clarifies the reverse relationship in the association.
     */
    #[Optional]
    public ?string $inverseLabel;

    /**
     * `new LabelCreateLabelParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelCreateLabelParams::with(fromObjectType: ..., label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelCreateLabelParams)
     *   ->withFromObjectType(...)
     *   ->withLabel(...)
     *   ->withName(...)
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
        string $label,
        string $name,
        ?string $inverseLabel = null,
    ): self {
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;
        $self['label'] = $label;
        $self['name'] = $name;

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
     * A descriptor that provides context about the relationship between two associated CRM objects.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The unique identifier for the association definition.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * An optional descriptor that clarifies the reverse relationship in the association.
     */
    public function withInverseLabel(string $inverseLabel): self
    {
        $self = clone $this;
        $self['inverseLabel'] = $inverseLabel;

        return $self;
    }
}
