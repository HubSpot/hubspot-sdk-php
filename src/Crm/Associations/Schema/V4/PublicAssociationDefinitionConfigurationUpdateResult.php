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
 *   typeID: int,
 *   userEnforcedMaxToObjectIDs?: int|null,
 * }
 */
final class PublicAssociationDefinitionConfigurationUpdateResult implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionConfigurationUpdateResultShape> */
    use SdkModel;

    /** @var value-of<Category> $category */
    #[Required(enum: Category::class)]
    public string $category;

    #[Required('typeId')]
    public int $typeID;

    #[Optional('userEnforcedMaxToObjectIds')]
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
        $self = new self;

        $self['category'] = $category;
        $self['typeID'] = $typeID;

        null !== $userEnforcedMaxToObjectIDs && $self['userEnforcedMaxToObjectIDs'] = $userEnforcedMaxToObjectIDs;

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

    public function withTypeID(int $typeID): self
    {
        $self = clone $this;
        $self['typeID'] = $typeID;

        return $self;
    }

    public function withUserEnforcedMaxToObjectIDs(
        int $userEnforcedMaxToObjectIDs
    ): self {
        $self = clone $this;
        $self['userEnforcedMaxToObjectIDs'] = $userEnforcedMaxToObjectIDs;

        return $self;
    }
}
