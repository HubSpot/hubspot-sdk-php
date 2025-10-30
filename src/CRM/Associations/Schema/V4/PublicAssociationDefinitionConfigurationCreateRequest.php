<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest\Category;

/**
 * @phpstan-type PublicAssociationDefinitionConfigurationCreateRequestShape = array{
 *   category: value-of<Category>, maxToObjectIDs: int, typeID: int
 * }
 */
final class PublicAssociationDefinitionConfigurationCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionConfigurationCreateRequestShape> */
    use SdkModel;

    /** @var value-of<Category> $category */
    #[Api(enum: Category::class)]
    public string $category;

    #[Api('maxToObjectIds')]
    public int $maxToObjectIDs;

    #[Api('typeId')]
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
        $obj = new self;

        $obj['category'] = $category;
        $obj->maxToObjectIDs = $maxToObjectIDs;
        $obj->typeID = $typeID;

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
        $obj->maxToObjectIDs = $maxToObjectIDs;

        return $obj;
    }

    public function withTypeID(int $typeID): self
    {
        $obj = clone $this;
        $obj->typeID = $typeID;

        return $obj;
    }
}
