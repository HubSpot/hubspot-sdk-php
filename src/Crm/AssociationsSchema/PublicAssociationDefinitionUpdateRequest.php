<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssociationDefinitionUpdateRequestShape = array{
 *   associationTypeID: int, label: string, inverseLabel?: string|null
 * }
 */
final class PublicAssociationDefinitionUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionUpdateRequestShape> */
    use SdkModel;

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
        $self = new self;

        $self['associationTypeID'] = $associationTypeID;
        $self['label'] = $label;

        null !== $inverseLabel && $self['inverseLabel'] = $inverseLabel;

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
