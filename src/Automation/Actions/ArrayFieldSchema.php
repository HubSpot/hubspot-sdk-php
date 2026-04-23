<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Automation\Actions\ArrayFieldSchema\Type;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ArrayFieldSchemaShape = array{
 *   items: mixed, type: Type|value-of<Type>
 * }
 */
final class ArrayFieldSchema implements BaseModel
{
    /** @use SdkModel<ArrayFieldSchemaShape> */
    use SdkModel;

    #[Required]
    public mixed $items;

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
     * @param Type|value-of<Type> $type
     */
    public static function with(mixed $items, Type|string $type = 'ARRAY'): self
    {
        $self = new self;

        $self['items'] = $items;
        $self['type'] = $type;

        return $self;
    }

    public function withItems(mixed $items): self
    {
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
