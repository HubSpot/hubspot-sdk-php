<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationCreateRequest\Category;

/**
 * @phpstan-type PublicAssociationDefinitionConfigurationCreateRequestShape = array{
 *   category: Category|value-of<Category>, maxToObjectIDs: int, typeID: int
 * }
 */
final class PublicAssociationDefinitionConfigurationCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionConfigurationCreateRequestShape> */
    use SdkModel;

    /**
     * Specifies the category of the association, which can be HUBSPOT_DEFINED, INTEGRATOR_DEFINED, or USER_DEFINED.
     *
     * @var value-of<Category> $category
     */
    #[Required(enum: Category::class)]
    public string $category;

    /**
     * The maximum number of target object IDs that can be associated with a single source object.
     */
    #[Required('maxToObjectIds')]
    public int $maxToObjectIDs;

    /**
     * An integer used to uniquely identify a specific association type within its category.
     */
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
     * The maximum number of target object IDs that can be associated with a single source object.
     */
    public function withMaxToObjectIDs(int $maxToObjectIDs): self
    {
        $self = clone $this;
        $self['maxToObjectIDs'] = $maxToObjectIDs;

        return $self;
    }

    /**
     * An integer used to uniquely identify a specific association type within its category.
     */
    public function withTypeID(int $typeID): self
    {
        $self = clone $this;
        $self['typeID'] = $typeID;

        return $self;
    }
}
