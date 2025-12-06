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
 *   associationTypeId: int,
 *   name: string,
 *   objectTypeId: string,
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
    #[Api]
    public int $associationTypeId;

    #[Api]
    public string $name;

    #[Api]
    public string $objectTypeId;

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
     *   associationTypeId: ...,
     *   name: ...,
     *   objectTypeId: ...,
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
        int $associationTypeId,
        string $name,
        string $objectTypeId,
        Type|string $type = 'ASSOCIATION_TIMESTAMP',
    ): self {
        $obj = new self;

        $obj['associationCategory'] = $associationCategory;
        $obj['associationTypeId'] = $associationTypeId;
        $obj['name'] = $name;
        $obj['objectTypeId'] = $objectTypeId;
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
        $obj['associationTypeId'] = $associationTypeID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

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
