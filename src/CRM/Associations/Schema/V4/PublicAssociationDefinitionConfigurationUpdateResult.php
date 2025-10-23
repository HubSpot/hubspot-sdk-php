<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateResult\Category;

/**
 * @phpstan-type public_association_definition_configuration_update_result = array{
 *   category: value-of<Category>, typeID: int, userEnforcedMaxToObjectIDs?: int
 * }
 */
final class PublicAssociationDefinitionConfigurationUpdateResult implements BaseModel
{
    /** @use SdkModel<public_association_definition_configuration_update_result> */
    use SdkModel;

    /** @var value-of<Category> $category */
    #[Api(enum: Category::class)]
    public string $category;

    #[Api('typeId')]
    public int $typeID;

    #[Api('userEnforcedMaxToObjectIds', optional: true)]
    public ?int $userEnforcedMaxToObjectIDs;

    /**
     * `new PublicAssociationDefinitionConfigurationUpdateResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionConfigurationUpdateResult::with(
     *   category: ..., typeID: ...
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
        int $typeID,
        ?int $userEnforcedMaxToObjectIDs = null,
    ): self {
        $obj = new self;

        $obj['category'] = $category;
        $obj->typeID = $typeID;

        null !== $userEnforcedMaxToObjectIDs && $obj->userEnforcedMaxToObjectIDs = $userEnforcedMaxToObjectIDs;

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
        $obj->typeID = $typeID;

        return $obj;
    }

    public function withUserEnforcedMaxToObjectIDs(
        int $userEnforcedMaxToObjectIDs
    ): self {
        $obj = clone $this;
        $obj->userEnforcedMaxToObjectIDs = $userEnforcedMaxToObjectIDs;

        return $obj;
    }
}
