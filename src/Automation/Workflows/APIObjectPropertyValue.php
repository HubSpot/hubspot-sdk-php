<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIObjectPropertyValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIObjectPropertyValueShape = array{
 *   propertyName: string, type: value-of<Type>
 * }
 */
final class APIObjectPropertyValue implements BaseModel
{
    /** @use SdkModel<APIObjectPropertyValueShape> */
    use SdkModel;

    /**
     * The property name to pull data from.
     */
    #[Api]
    public string $propertyName;

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
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
        $obj = new self;

        $obj->propertyName = $propertyName;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The property name to pull data from.
     */
    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
