<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociationSpecWithLabel\Category;

/**
 * Defines the type, direction, and details of the relationship between two CRM objects.
 *
 * @phpstan-type AssociationSpecWithLabelShape = array{
 *   category: Category|value-of<Category>, typeID: int, label?: string|null
 * }
 */
final class AssociationSpecWithLabel implements BaseModel
{
    /** @use SdkModel<AssociationSpecWithLabelShape> */
    use SdkModel;

    /**
     * The category of the association, such as HUBSPOT_DEFINED, USER_DEFINED, or INTEGRATOR_DEFINED.
     *
     * @var value-of<Category> $category
     */
    #[Required(enum: Category::class)]
    public string $category;

    /**
     * The unique identifier for the type of association.
     */
    #[Required('typeId')]
    public int $typeID;

    /**
     * A label describing the association between two objects.
     */
    #[Optional]
    public ?string $label;

    /**
     * `new AssociationSpecWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationSpecWithLabel::with(category: ..., typeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationSpecWithLabel)->withCategory(...)->withTypeID(...)
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
        ?string $label = null
    ): self {
        $self = new self;

        $self['category'] = $category;
        $self['typeID'] = $typeID;

        null !== $label && $self['label'] = $label;

        return $self;
    }

    /**
     * The category of the association, such as HUBSPOT_DEFINED, USER_DEFINED, or INTEGRATOR_DEFINED.
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
     * The unique identifier for the type of association.
     */
    public function withTypeID(int $typeID): self
    {
        $self = clone $this;
        $self['typeID'] = $typeID;

        return $self;
    }

    /**
     * A label describing the association between two objects.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
