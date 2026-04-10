<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateRequest\Category;

/**
 * @phpstan-type PublicAssociationDefinitionConfigurationUpdateRequestShape = array{
 *   category: Category|value-of<Category>, maxToObjectIDs: int, typeID: int
 * }
 */
final class PublicAssociationDefinitionConfigurationUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionConfigurationUpdateRequestShape> */
    use SdkModel;

    /**
     * Specifies the category of the association, which can be HUBSPOT_DEFINED, INTEGRATOR_DEFINED, or USER_DEFINED.
     *
     * @var value-of<Category> $category
     */
    #[Required(enum: Category::class)]
    public string $category;

    /**
     * Defines the maximum number of target object IDs that can be associated.
     */
    #[Required('maxToObjectIds')]
    public int $maxToObjectIDs;

    /**
     * A unique identifier for the association type.
     */
    #[Required('typeId')]
    public int $typeID;

    /**
     * `new PublicAssociationDefinitionConfigurationUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionConfigurationUpdateRequest::with(
     *   category: ..., maxToObjectIDs: ..., typeID: ...
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
     * Specifies the category of the association, which can be HUBSPOT_DEFINED, INTEGRATOR_DEFINED, or USER_DEFINED.
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
     * Defines the maximum number of target object IDs that can be associated.
     */
    public function withMaxToObjectIDs(int $maxToObjectIDs): self
    {
        $self = clone $this;
        $self['maxToObjectIDs'] = $maxToObjectIDs;

        return $self;
    }

    /**
     * A unique identifier for the association type.
     */
    public function withTypeID(int $typeID): self
    {
        $self = clone $this;
        $self['typeID'] = $typeID;

        return $self;
    }
}
