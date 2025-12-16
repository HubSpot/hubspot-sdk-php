<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AssociationSpecWithLabelShape from \HubspotSDK\Crm\AssociationSpecWithLabel
 *
 * @phpstan-type MultiAssociatedObjectWithLabelShape = array{
 *   associationTypes: list<AssociationSpecWithLabelShape>, toObjectID: string
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
     * The unique identifier for the target object in the association.
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
     * @param list<AssociationSpecWithLabelShape> $associationTypes
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
     * @param list<AssociationSpecWithLabelShape> $associationTypes
     */
    public function withAssociationTypes(array $associationTypes): self
    {
        $self = clone $this;
        $self['associationTypes'] = $associationTypes;

        return $self;
    }

    /**
     * The unique identifier for the target object in the association.
     */
    public function withToObjectID(string $toObjectID): self
    {
        $self = clone $this;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }
}
