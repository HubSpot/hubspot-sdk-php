<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest\Category;

/**
 * @phpstan-type PublicAssociationDefinitionConfigurationUpdateRequestShape = array{
 *   category: value-of<Category>, maxToObjectIds: int, typeId: int
 * }
 */
final class PublicAssociationDefinitionConfigurationUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionConfigurationUpdateRequestShape> */
    use SdkModel;

    /** @var value-of<Category> $category */
    #[Api(enum: Category::class)]
    public string $category;

    #[Api]
    public int $maxToObjectIds;

    #[Api]
    public int $typeId;

    /**
     * `new PublicAssociationDefinitionConfigurationUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionConfigurationUpdateRequest::with(
     *   category: ..., maxToObjectIds: ..., typeId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationDefinitionConfigurationUpdateRequest)
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
