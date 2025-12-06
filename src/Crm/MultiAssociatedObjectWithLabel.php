<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociationSpecWithLabel\Category;

/**
 * @phpstan-type MultiAssociatedObjectWithLabelShape = array{
 *   associationTypes: list<AssociationSpecWithLabel>, toObjectId: string
 * }
 */
final class MultiAssociatedObjectWithLabel implements BaseModel
{
    /** @use SdkModel<MultiAssociatedObjectWithLabelShape> */
    use SdkModel;

    /** @var list<AssociationSpecWithLabel> $associationTypes */
    #[Api(list: AssociationSpecWithLabel::class)]
    public array $associationTypes;

    /**
     * The unique identifier for the target object in the association.
     */
    #[Api]
    public string $toObjectId;

    /**
     * `new MultiAssociatedObjectWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultiAssociatedObjectWithLabel::with(associationTypes: ..., toObjectId: ...)
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
     * @param list<AssociationSpecWithLabel|array{
     *   category: value-of<Category>, typeId: int, label?: string|null
     * }> $associationTypes
     */
    public static function with(
        array $associationTypes,
        string $toObjectId
    ): self {
        $obj = new self;

        $obj['associationTypes'] = $associationTypes;
        $obj['toObjectId'] = $toObjectId;

        return $obj;
    }

    /**
     * @param list<AssociationSpecWithLabel|array{
     *   category: value-of<Category>, typeId: int, label?: string|null
     * }> $associationTypes
     */
    public function withAssociationTypes(array $associationTypes): self
    {
        $obj = clone $this;
        $obj['associationTypes'] = $associationTypes;

        return $obj;
    }

    /**
     * The unique identifier for the target object in the association.
     */
    public function withToObjectID(string $toObjectID): self
    {
        $obj = clone $this;
        $obj['toObjectId'] = $toObjectID;

        return $obj;
    }
}
