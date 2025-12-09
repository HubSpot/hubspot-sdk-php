<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateResult\Category;

/**
 * @phpstan-type PublicAssociationDefinitionConfigurationUpdateResultShape = array{
 *   category: value-of<Category>,
 *   typeId: int,
 *   userEnforcedMaxToObjectIds?: int|null,
 * }
 */
final class PublicAssociationDefinitionConfigurationUpdateResult implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionConfigurationUpdateResultShape> */
    use SdkModel;

    /** @var value-of<Category> $category */
    #[Required(enum: Category::class)]
    public string $category;

    #[Required]
    public int $typeId;

    #[Optional]
    public ?int $userEnforcedMaxToObjectIds;

    /**
     * `new PublicAssociationDefinitionConfigurationUpdateResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionConfigurationUpdateResult::with(
     *   category: ..., typeId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationDefinitionConfigurationUpdateResult)
     *   ->withCategory(...)
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
        int $typeId,
        ?int $userEnforcedMaxToObjectIds = null,
    ): self {
        $obj = new self;

        $obj['category'] = $category;
        $obj['typeId'] = $typeId;

        null !== $userEnforcedMaxToObjectIds && $obj['userEnforcedMaxToObjectIds'] = $userEnforcedMaxToObjectIds;

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

    public function withTypeID(int $typeID): self
    {
        $obj = clone $this;
        $obj['typeId'] = $typeID;

        return $obj;
    }

    public function withUserEnforcedMaxToObjectIDs(
        int $userEnforcedMaxToObjectIDs
    ): self {
        $obj = clone $this;
        $obj['userEnforcedMaxToObjectIds'] = $userEnforcedMaxToObjectIDs;

        return $obj;
    }
}
