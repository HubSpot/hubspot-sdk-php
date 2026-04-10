<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Automation\Actions\ObjectFieldSchema\Type;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectFieldSchemaShape = array{
 *   properties: mixed, type: Type|value-of<Type>
 * }
 */
final class ObjectFieldSchema implements BaseModel
{
    /** @use SdkModel<ObjectFieldSchemaShape> */
    use SdkModel;

    /**
     * Contains the properties of the object.
     */
    #[Required]
    public mixed $properties;

    /**
     * Specifies the type of the field, which is 'OBJECT' by default.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new ObjectFieldSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectFieldSchema::with(properties: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectFieldSchema)->withProperties(...)->withType(...)
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
    public static function with(
        mixed $properties,
        Type|string $type = 'OBJECT'
    ): self {
        $self = new self;

        $self['properties'] = $properties;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Contains the properties of the object.
     */
    public function withProperties(mixed $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Specifies the type of the field, which is 'OBJECT' by default.
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
