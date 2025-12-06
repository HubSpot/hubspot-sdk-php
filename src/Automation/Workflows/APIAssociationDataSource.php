<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAssociationDataSource\AssociationCategory;
use HubspotSDK\Automation\Workflows\APIAssociationDataSource\Type;
use HubspotSDK\Automation\Workflows\APISort\Order;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIAssociationDataSourceShape = array{
 *   associationCategory: value-of<AssociationCategory>,
 *   associationTypeId: int,
 *   name: string,
 *   objectTypeId: string,
 *   type: value-of<Type>,
 *   sortBy?: APISort|null,
 * }
 */
final class APIAssociationDataSource implements BaseModel
{
    /** @use SdkModel<APIAssociationDataSourceShape> */
    use SdkModel;

    /** @var value-of<AssociationCategory> $associationCategory */
    #[Api(enum: AssociationCategory::class)]
    public string $associationCategory;

    #[Api]
    public int $associationTypeId;

    #[Api]
    public string $name;

    #[Api]
    public string $objectTypeId;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?APISort $sortBy;

    /**
     * `new APIAssociationDataSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIAssociationDataSource::with(
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
     * (new APIAssociationDataSource)
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
     * @param APISort|array{
     *   order: value-of<Order>, property: string, missing?: string|null
     * } $sortBy
     */
    public static function with(
        AssociationCategory|string $associationCategory,
        int $associationTypeId,
        string $name,
        string $objectTypeId,
        Type|string $type = 'ASSOCIATION',
        APISort|array|null $sortBy = null,
    ): self {
        $obj = new self;

        $obj['associationCategory'] = $associationCategory;
        $obj['associationTypeId'] = $associationTypeId;
        $obj['name'] = $name;
        $obj['objectTypeId'] = $objectTypeId;
        $obj['type'] = $type;

        null !== $sortBy && $obj['sortBy'] = $sortBy;

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

    /**
     * @param APISort|array{
     *   order: value-of<Order>, property: string, missing?: string|null
     * } $sortBy
     */
    public function withSortBy(APISort|array $sortBy): self
    {
        $obj = clone $this;
        $obj['sortBy'] = $sortBy;

        return $obj;
    }
}
