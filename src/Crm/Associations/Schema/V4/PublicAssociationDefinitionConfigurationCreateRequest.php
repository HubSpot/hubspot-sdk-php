<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest\Category;

/**
 * @phpstan-type PublicAssociationDefinitionConfigurationCreateRequestShape = array{
 *   category: Category|value-of<Category>, maxToObjectIDs: int, typeID: int
 * }
 */
final class PublicAssociationDefinitionConfigurationCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionConfigurationCreateRequestShape> */
    use SdkModel;

    /** @var value-of<Category> $category */
    #[Required(enum: Category::class)]
    public string $category;

    #[Required('maxToObjectIds')]
    public int $maxToObjectIDs;

    #[Required('typeId')]
    public int $typeID;

    /**
     * `new PublicAssociationDefinitionConfigurationCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionConfigurationCreateRequest::with(
     *   category: ..., maxToObjectIDs: ..., typeID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationDefinitionConfigurationCreateRequest)
     *   ->withCategory(...)
     *   ->withMaxToObjectIDs(...)
     *   ->withTypeID(...)
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
     * @param Category|value-of<Category> $category
     */
    public static function with(
        Category|string $category,
        int $maxToObjectIDs,
        int $typeID
    ): self {
        $self = new self;

        $self['category'] = $category;
        $self['maxToObjectIDs'] = $maxToObjectIDs;
        $self['typeID'] = $typeID;

        return $self;
    }

    /**
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withMaxToObjectIDs(int $maxToObjectIDs): self
    {
        $self = clone $this;
        $self['maxToObjectIDs'] = $maxToObjectIDs;

        return $self;
    }

    public function withTypeID(int $typeID): self
    {
        $self = clone $this;
        $self['typeID'] = $typeID;

        return $self;
    }
}
