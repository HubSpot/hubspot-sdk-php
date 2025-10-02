<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIAppendObjectPropertyValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_append_object_property_value = array{
 *   appendPropertyName: string, type: value-of<Type>
 * }
 */
final class AutomationAPIAppendObjectPropertyValue implements BaseModel
{
    /** @use SdkModel<automation_api_append_object_property_value> */
    use SdkModel;

    #[Api]
    public string $appendPropertyName;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIAppendObjectPropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIAppendObjectPropertyValue::with(appendPropertyName: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIAppendObjectPropertyValue)
     *   ->withAppendPropertyName(...)
     *   ->withType(...)
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
        $obj = new self;

        $obj->appendPropertyName = $appendPropertyName;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withAppendPropertyName(string $appendPropertyName): self
    {
        $obj = clone $this;
        $obj->appendPropertyName = $appendPropertyName;

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
