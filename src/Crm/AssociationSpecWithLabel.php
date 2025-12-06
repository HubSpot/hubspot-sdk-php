<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociationSpecWithLabel\Category;

/**
 * @phpstan-type AssociationSpecWithLabelShape = array{
 *   category: value-of<Category>, typeId: int, label?: string|null
 * }
 */
final class AssociationSpecWithLabel implements BaseModel
{
    /** @use SdkModel<AssociationSpecWithLabelShape> */
    use SdkModel;

    /** @var value-of<Category> $category */
    #[Api(enum: Category::class)]
    public string $category;

    #[Api]
    public int $typeId;

    #[Api(optional: true)]
    public ?string $label;

    /**
     * `new AssociationSpecWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationSpecWithLabel::with(category: ..., typeId: ...)
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
        int $typeId,
        ?string $label = null
    ): self {
        $obj = new self;

        $obj['category'] = $category;
        $obj['typeId'] = $typeId;

        null !== $label && $obj['label'] = $label;

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

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }
}
