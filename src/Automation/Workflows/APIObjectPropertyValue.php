<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIObjectPropertyValue\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIObjectPropertyValueShape = array{
 *   propertyName: string, type: Type|value-of<Type>
 * }
 */
final class APIObjectPropertyValue implements BaseModel
{
    /** @use SdkModel<APIObjectPropertyValueShape> */
    use SdkModel;

    #[Required]
    public string $propertyName;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIObjectPropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIObjectPropertyValue::with(propertyName: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIObjectPropertyValue)->withPropertyName(...)->withType(...)
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
        string $propertyName,
        Type|string $type = 'OBJECT_PROPERTY'
    ): self {
        $self = new self;

        $self['propertyName'] = $propertyName;
        $self['type'] = $type;

        return $self;
    }

    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

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
