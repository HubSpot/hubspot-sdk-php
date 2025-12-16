<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAppendObjectPropertyValue\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIAppendObjectPropertyValueShape = array{
 *   appendPropertyName: string, type: Type|value-of<Type>
 * }
 */
final class APIAppendObjectPropertyValue implements BaseModel
{
    /** @use SdkModel<APIAppendObjectPropertyValueShape> */
    use SdkModel;

    #[Required]
    public string $appendPropertyName;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIAppendObjectPropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIAppendObjectPropertyValue::with(appendPropertyName: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIAppendObjectPropertyValue)->withAppendPropertyName(...)->withType(...)
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
        string $appendPropertyName,
        Type|string $type = 'APPEND_OBJECT_PROPERTY'
    ): self {
        $self = new self;

        $self['appendPropertyName'] = $appendPropertyName;
        $self['type'] = $type;

        return $self;
    }

    public function withAppendPropertyName(string $appendPropertyName): self
    {
        $self = clone $this;
        $self['appendPropertyName'] = $appendPropertyName;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
