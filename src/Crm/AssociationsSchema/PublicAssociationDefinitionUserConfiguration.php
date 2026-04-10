<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionUserConfiguration\Category;

/**
 * @phpstan-type PublicAssociationDefinitionUserConfigurationShape = array{
 *   category: Category|value-of<Category>,
 *   typeID: int,
 *   label?: string|null,
 *   userEnforcedMaxToObjectIDs?: int|null,
 * }
 */
final class PublicAssociationDefinitionUserConfiguration implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionUserConfigurationShape> */
    use SdkModel;

    /**
     * The category of the association, which can be HUBSPOT_DEFINED, INTEGRATOR_DEFINED, or USER_DEFINED.
     *
     * @var value-of<Category> $category
     */
    #[Required(enum: Category::class)]
    public string $category;

    /**
     * A unique integer identifier for the association type within its category.
     */
    #[Required('typeId')]
    public int $typeID;

    /**
     * A descriptor providing context about the relationship between associated records.
     */
    #[Optional]
    public ?string $label;

    /**
     * The maximum number of target object IDs that a user can enforce in an association.
     */
    #[Optional('userEnforcedMaxToObjectIds')]
    public ?int $userEnforcedMaxToObjectIDs;

    /**
     * `new PublicAssociationDefinitionUserConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionUserConfiguration::with(category: ..., typeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationDefinitionUserConfiguration)
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
        ?string $label = null,
        ?int $userEnforcedMaxToObjectIDs = null,
    ): self {
        $self = new self;

        $self['category'] = $category;
        $self['typeID'] = $typeID;

        null !== $label && $self['label'] = $label;
        null !== $userEnforcedMaxToObjectIDs && $self['userEnforcedMaxToObjectIDs'] = $userEnforcedMaxToObjectIDs;

        return $self;
    }

    /**
     * The category of the association, which can be HUBSPOT_DEFINED, INTEGRATOR_DEFINED, or USER_DEFINED.
     *
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * A unique integer identifier for the association type within its category.
     */
    public function withTypeID(int $typeID): self
    {
        $self = clone $this;
        $self['typeID'] = $typeID;

        return $self;
    }

    /**
     * A descriptor providing context about the relationship between associated records.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The maximum number of target object IDs that a user can enforce in an association.
     */
    public function withUserEnforcedMaxToObjectIDs(
        int $userEnforcedMaxToObjectIDs
    ): self {
        $self = clone $this;
        $self['userEnforcedMaxToObjectIDs'] = $userEnforcedMaxToObjectIDs;

        return $self;
    }
}
