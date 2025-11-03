<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAssociationTimestampDataSource\AssociationCategory;
use HubspotSDK\Automation\Workflows\APIAssociationTimestampDataSource\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIAssociationTimestampDataSourceShape = array{
 *   associationCategory: value-of<AssociationCategory>,
 *   associationTypeID: int,
 *   name: string,
 *   objectTypeID: string,
 *   type: value-of<Type>,
 * }
 */
final class APIAssociationTimestampDataSource implements BaseModel
{
    /** @use SdkModel<APIAssociationTimestampDataSourceShape> */
    use SdkModel;

    /** @var value-of<AssociationCategory> $associationCategory */
    #[Api(enum: AssociationCategory::class)]
    public string $associationCategory;

    /**
     * The ID representing the type of association.
     */
    #[Api('associationTypeId')]
    public int $associationTypeID;

    #[Api]
    public string $name;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIAssociationTimestampDataSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIAssociationTimestampDataSource::with(
     *   associationCategory: ...,
     *   associationTypeID: ...,
     *   name: ...,
     *   objectTypeID: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIAssociationTimestampDataSource)
     *   ->withAssociationCategory(...)
     *   ->withAssociationTypeID(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
     *   ->withType(...)
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
     * @param AssociationCategory|value-of<AssociationCategory> $associationCategory
     * @param Type|value-of<Type> $type
     */
    public static function with(
        AssociationCategory|string $associationCategory,
        int $associationTypeID,
        string $name,
        string $objectTypeID,
        Type|string $type = 'ASSOCIATION_TIMESTAMP',
    ): self {
        $obj = new self;

        $obj['associationCategory'] = $associationCategory;
        $obj->associationTypeID = $associationTypeID;
        $obj->name = $name;
        $obj->objectTypeID = $objectTypeID;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param AssociationCategory|value-of<AssociationCategory> $associationCategory
     */
    public function withAssociationCategory(
        AssociationCategory|string $associationCategory
    ): self {
        $obj = clone $this;
        $obj['associationCategory'] = $associationCategory;

        return $obj;
    }

    /**
     * The ID representing the type of association.
     */
    public function withAssociationTypeID(int $associationTypeID): self
    {
        $obj = clone $this;
        $obj->associationTypeID = $associationTypeID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
