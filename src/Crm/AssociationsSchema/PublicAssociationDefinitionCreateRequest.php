<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssociationDefinitionCreateRequestShape = array{
 *   label: string, name: string, inverseLabel?: string|null
 * }
 */
final class PublicAssociationDefinitionCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionCreateRequestShape> */
    use SdkModel;

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
     * `new PublicAssociationDefinitionCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionCreateRequest::with(label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationDefinitionCreateRequest)->withLabel(...)->withName(...)
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
        string $label,
        string $name,
        ?string $inverseLabel = null
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['name'] = $name;

        null !== $inverseLabel && $self['inverseLabel'] = $inverseLabel;

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
