<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest\Category;

/**
 * @phpstan-type PublicAssociationDefinitionConfigurationCreateRequestShape = array{
 *   category: value-of<Category>, maxToObjectIds: int, typeId: int
 * }
 */
final class PublicAssociationDefinitionConfigurationCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionConfigurationCreateRequestShape> */
    use SdkModel;

    /** @var value-of<Category> $category */
    #[Required(enum: Category::class)]
    public string $category;

    #[Required]
    public int $maxToObjectIds;

    #[Required]
    public int $typeId;

    /**
     * `new PublicAssociationDefinitionConfigurationCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionConfigurationCreateRequest::with(
     *   category: ..., maxToObjectIds: ..., typeId: ...
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
        int $maxToObjectIds,
        int $typeId
    ): self {
        $obj = new self;

        $obj['category'] = $category;
        $obj['maxToObjectIds'] = $maxToObjectIds;
        $obj['typeId'] = $typeId;

        return $obj;
    }

    /**
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    public function withMaxToObjectIDs(int $maxToObjectIDs): self
    {
        $obj = clone $this;
        $obj['maxToObjectIds'] = $maxToObjectIDs;

        return $obj;
    }

    public function withTypeID(int $typeID): self
    {
        $obj = clone $this;
        $obj['typeId'] = $typeID;

        return $obj;
    }
}
