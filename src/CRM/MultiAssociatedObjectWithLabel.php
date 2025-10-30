<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\V4\AssociationSpecWithLabel1;

/**
 * @phpstan-type MultiAssociatedObjectWithLabelShape = array{
 *   associationTypes: list<AssociationSpecWithLabel1>, toObjectID: string
 * }
 */
final class MultiAssociatedObjectWithLabel implements BaseModel
{
    /** @use SdkModel<MultiAssociatedObjectWithLabelShape> */
    use SdkModel;

    /** @var list<AssociationSpecWithLabel1> $associationTypes */
    #[Api(list: AssociationSpecWithLabel1::class)]
    public array $associationTypes;

    #[Api('toObjectId')]
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
     * @param list<AssociationSpecWithLabel1> $associationTypes
     */
    public static function with(
        array $associationTypes,
        string $toObjectID
    ): self {
        $obj = new self;

        $obj->associationTypes = $associationTypes;
        $obj->toObjectID = $toObjectID;

        return $obj;
    }

    /**
     * @param list<AssociationSpecWithLabel1> $associationTypes
     */
    public function withAssociationTypes(array $associationTypes): self
    {
        $obj = clone $this;
        $obj->associationTypes = $associationTypes;

        return $obj;
    }

    public function withToObjectID(string $toObjectID): self
    {
        $obj = clone $this;
        $obj->toObjectID = $toObjectID;

        return $obj;
    }
}
