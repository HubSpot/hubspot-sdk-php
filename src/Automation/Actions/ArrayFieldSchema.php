<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\ArrayFieldSchema\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ItemsVariants from \HubspotSDK\Automation\Actions\ArrayFieldSchema\Items
 * @phpstan-import-type ItemsShape from \HubspotSDK\Automation\Actions\ArrayFieldSchema\Items
 *
 * @phpstan-type ArrayFieldSchemaShape = array{
 *   items: ItemsShape, type: Type|value-of<Type>
 * }
 */
final class ArrayFieldSchema implements BaseModel
{
    /** @use SdkModel<ArrayFieldSchemaShape> */
    use SdkModel;

    /**
     * Defines the type of elements contained within the array, which can be an integer, long, double, string, boolean, another array, or an object.
     *
     * @var ItemsVariants $items
     */
    #[Required]
    public IntegerFieldSchema|LongFieldSchema|DoubleFieldSchema|StringFieldSchema|BooleanFieldSchema|ArrayFieldSchema|ObjectFieldSchema $items;

    /**
     * Specifies that the field is of type 'ARRAY'.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new ArrayFieldSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArrayFieldSchema::with(items: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArrayFieldSchema)->withItems(...)->withType(...)
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
     * @param ItemsShape $items
     * @param Type|value-of<Type> $type
     */
    public static function with(
        IntegerFieldSchema|array|LongFieldSchema|DoubleFieldSchema|StringFieldSchema|BooleanFieldSchema|ArrayFieldSchema|ObjectFieldSchema $items,
        Type|string $type = 'ARRAY',
    ): self {
        $self = new self;

        $self['items'] = $items;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Defines the type of elements contained within the array, which can be an integer, long, double, string, boolean, another array, or an object.
     *
     * @param ItemsShape $items
     */
    public function withItems(
        IntegerFieldSchema|array|LongFieldSchema|DoubleFieldSchema|StringFieldSchema|BooleanFieldSchema|ArrayFieldSchema|ObjectFieldSchema $items,
    ): self {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }

    /**
     * Specifies that the field is of type 'ARRAY'.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
