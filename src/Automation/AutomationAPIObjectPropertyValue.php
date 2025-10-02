<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIObjectPropertyValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_object_property_value = array{
 *   propertyName: string, type: value-of<Type>
 * }
 */
final class AutomationAPIObjectPropertyValue implements BaseModel
{
    /** @use SdkModel<automation_api_object_property_value> */
    use SdkModel;

    #[Api]
    public string $propertyName;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIObjectPropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIObjectPropertyValue::with(propertyName: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIObjectPropertyValue)->withPropertyName(...)->withType(...)
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
        $obj = new self;

        $obj->propertyName = $propertyName;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
