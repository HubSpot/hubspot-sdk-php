<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\AssociationSpec;
use HubSpotSDK\Cms\MediaBridge\LookupAssociationSpec\Cardinality;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AssociationSpecShape from \HubSpotSDK\AssociationSpec
 *
 * @phpstan-type LookupAssociationSpecShape = array{
 *   associationSpec: AssociationSpec|AssociationSpecShape,
 *   cardinality?: null|Cardinality|value-of<Cardinality>,
 *   maxToObjectIDs?: int|null,
 *   toObjectTypeID?: string|null,
 * }
 */
final class LookupAssociationSpec implements BaseModel
{
    /** @use SdkModel<LookupAssociationSpecShape> */
    use SdkModel;

    /**
     * Defines the type, direction, and details of the relationship between two CRM objects.
     */
    #[Required]
    public AssociationSpec $associationSpec;

    /** @var value-of<Cardinality>|null $cardinality */
    #[Optional(enum: Cardinality::class)]
    public ?string $cardinality;

    #[Optional('maxToObjectIds')]
    public ?int $maxToObjectIDs;

    #[Optional('toObjectTypeId')]
    public ?string $toObjectTypeID;

    /**
     * `new LookupAssociationSpec()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LookupAssociationSpec::with(associationSpec: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LookupAssociationSpec)->withAssociationSpec(...)
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
     *
     * @param AssociationSpec|AssociationSpecShape $associationSpec
     * @param Cardinality|value-of<Cardinality>|null $cardinality
     */
    public static function with(
        AssociationSpec|array $associationSpec,
        Cardinality|string|null $cardinality = null,
        ?int $maxToObjectIDs = null,
        ?string $toObjectTypeID = null,
    ): self {
        $self = new self;

        $self['associationSpec'] = $associationSpec;

        null !== $cardinality && $self['cardinality'] = $cardinality;
        null !== $maxToObjectIDs && $self['maxToObjectIDs'] = $maxToObjectIDs;
        null !== $toObjectTypeID && $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    /**
     * Defines the type, direction, and details of the relationship between two CRM objects.
     *
     * @param AssociationSpec|AssociationSpecShape $associationSpec
     */
    public function withAssociationSpec(
        AssociationSpec|array $associationSpec
    ): self {
        $self = clone $this;
        $self['associationSpec'] = $associationSpec;

        return $self;
    }

    /**
     * @param Cardinality|value-of<Cardinality> $cardinality
     */
    public function withCardinality(Cardinality|string $cardinality): self
    {
        $self = clone $this;
        $self['cardinality'] = $cardinality;

        return $self;
    }

    public function withMaxToObjectIDs(int $maxToObjectIDs): self
    {
        $self = clone $this;
        $self['maxToObjectIDs'] = $maxToObjectIDs;

        return $self;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }
}
