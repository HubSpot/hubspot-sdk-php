<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Represents an object that is associated with multiple other objects, with optional context.
 *
 * @phpstan-import-type AssociationSpecWithLabelShape from \HubSpotSDK\Crm\AssociationSpecWithLabel
 *
 * @phpstan-type MultiAssociatedObjectWithLabelShape = array{
 *   associationTypes: list<AssociationSpecWithLabel|AssociationSpecWithLabelShape>,
 *   toObjectID: string,
 * }
 */
final class MultiAssociatedObjectWithLabel implements BaseModel
{
    /** @use SdkModel<MultiAssociatedObjectWithLabelShape> */
    use SdkModel;

    /** @var list<AssociationSpecWithLabel> $associationTypes */
    #[Required(list: AssociationSpecWithLabel::class)]
    public array $associationTypes;

    /**
     * Target unique ID of the object.
     */
    #[Required('toObjectId')]
    public string $toObjectID;

    /**
     * `new MultiAssociatedObjectWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultiAssociatedObjectWithLabel::with(associationTypes: ..., toObjectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MultiAssociatedObjectWithLabel)
     *   ->withAssociationTypes(...)
     *   ->withToObjectID(...)
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
     * @param list<AssociationSpecWithLabel|AssociationSpecWithLabelShape> $associationTypes
     */
    public static function with(
        array $associationTypes,
        string $toObjectID
    ): self {
        $self = new self;

        $self['associationTypes'] = $associationTypes;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }

    /**
     * @param list<AssociationSpecWithLabel|AssociationSpecWithLabelShape> $associationTypes
     */
    public function withAssociationTypes(array $associationTypes): self
    {
        $self = clone $this;
        $self['associationTypes'] = $associationTypes;

        return $self;
    }

    /**
     * Target unique ID of the object.
     */
    public function withToObjectID(string $toObjectID): self
    {
        $self = clone $this;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }
}
