<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\AssociationSpecWithLabel\Category;

/**
 * @phpstan-type association_spec_with_label = array{
 *   category: value-of<Category>, typeID: int, label?: string
 * }
 */
final class AssociationSpecWithLabel implements BaseModel
{
    /** @use SdkModel<association_spec_with_label> */
    use SdkModel;

    /**
     * The category of this association type (either HUBSPOT_DEFINED or USER_DEFINED).
     *
     * @var value-of<Category> $category
     */
    #[Api(enum: Category::class)]
    public string $category;

    /**
     * The ID of this association type, unique within an association category.
     */
    #[Api('typeId')]
    public int $typeID;

    /**
     * The label for this association type.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj['category'] = $category;
        $obj->typeID = $typeID;

        null !== $label && $obj->label = $label;

        return $obj;
    }

    /**
     * The category of this association type (either HUBSPOT_DEFINED or USER_DEFINED).
     *
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    /**
     * The ID of this association type, unique within an association category.
     */
    public function withTypeID(int $typeID): self
    {
        $obj = clone $this;
        $obj->typeID = $typeID;

        return $obj;
    }

    /**
     * The label for this association type.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }
}
