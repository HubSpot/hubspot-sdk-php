<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\AssociationSpecWithLabel\Category;

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
     * Association category. Can be HUBSPOT_DEFINED, USER_DEFINED, INTEGRATOR_DEFINED or WORK.
     *
     * @var value-of<Category> $category
     */
    #[Required(enum: Category::class)]
    public string $category;

    /**
     * An integer value used to uniquely identify a specific association type within its Association Category.
     */
    #[Required('typeId')]
    public int $typeID;

    /**
     * An optional descriptor that provides additional context about the relationship between associated records, such as "Mentor" and "Mentee".
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
     * Association category. Can be HUBSPOT_DEFINED, USER_DEFINED, INTEGRATOR_DEFINED or WORK.
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
     * An integer value used to uniquely identify a specific association type within its Association Category.
     */
    public function withTypeID(int $typeID): self
    {
        $self = clone $this;
        $self['typeID'] = $typeID;

        return $self;
    }

    /**
     * An optional descriptor that provides additional context about the relationship between associated records, such as "Mentor" and "Mentee".
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
