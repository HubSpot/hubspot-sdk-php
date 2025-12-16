<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAssociationDataSource\AssociationCategory;
use HubspotSDK\Automation\Workflows\APIAssociationDataSource\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APISortShape from \HubspotSDK\Automation\Workflows\APISort
 *
 * @phpstan-type APIAssociationDataSourceShape = array{
 *   associationCategory: AssociationCategory|value-of<AssociationCategory>,
 *   associationTypeID: int,
 *   name: string,
 *   objectTypeID: string,
 *   type: Type|value-of<Type>,
 *   sortBy?: null|APISort|APISortShape,
 * }
 */
final class APIAssociationDataSource implements BaseModel
{
    /** @use SdkModel<APIAssociationDataSourceShape> */
    use SdkModel;

    /** @var value-of<AssociationCategory> $associationCategory */
    #[Required(enum: AssociationCategory::class)]
    public string $associationCategory;

    #[Required('associationTypeId')]
    public int $associationTypeID;

    #[Required]
    public string $name;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?APISort $sortBy;

    /**
     * `new APIAssociationDataSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIAssociationDataSource::with(
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
     * @param APISortShape $sortBy
     */
    public static function with(
        AssociationCategory|string $associationCategory,
        int $associationTypeID,
        string $name,
        string $objectTypeID,
        Type|string $type = 'ASSOCIATION',
        APISort|array|null $sortBy = null,
    ): self {
        $self = new self;

        $self['associationCategory'] = $associationCategory;
        $self['associationTypeID'] = $associationTypeID;
        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['type'] = $type;

        null !== $sortBy && $self['sortBy'] = $sortBy;

        return $self;
    }

    /**
     * @param AssociationCategory|value-of<AssociationCategory> $associationCategory
     */
    public function withAssociationCategory(
        AssociationCategory|string $associationCategory
    ): self {
        $self = clone $this;
        $self['associationCategory'] = $associationCategory;

        return $self;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $self = clone $this;
        $self['associationTypeID'] = $associationTypeID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param APISortShape $sortBy
     */
    public function withSortBy(APISort|array $sortBy): self
    {
        $self = clone $this;
        $self['sortBy'] = $sortBy;

        return $self;
    }
}
