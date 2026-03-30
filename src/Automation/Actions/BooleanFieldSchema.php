<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\BooleanFieldSchema\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BooleanFieldSchemaShape = array{type: Type|value-of<Type>}
 */
final class BooleanFieldSchema implements BaseModel
{
    /** @use SdkModel<BooleanFieldSchemaShape> */
    use SdkModel;

    /**
     * Specifies the field type as BOOLEAN, indicating that the field can hold a true or false value.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new BooleanFieldSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BooleanFieldSchema::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BooleanFieldSchema)->withType(...)
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
    public static function with(Type|string $type = 'BOOLEAN'): self
    {
        $self = new self;

        $self['type'] = $type;

        return $self;
    }

    /**
     * Specifies the field type as BOOLEAN, indicating that the field can hold a true or false value.
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
