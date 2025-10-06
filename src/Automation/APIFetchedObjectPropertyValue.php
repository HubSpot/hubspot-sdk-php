<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\APIFetchedObjectPropertyValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_fetched_object_property_value = array{
 *   propertyToken: string, type: value-of<Type>
 * }
 */
final class APIFetchedObjectPropertyValue implements BaseModel
{
    /** @use SdkModel<api_fetched_object_property_value> */
    use SdkModel;

    #[Api]
    public string $propertyToken;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIFetchedObjectPropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFetchedObjectPropertyValue::with(propertyToken: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFetchedObjectPropertyValue)->withPropertyToken(...)->withType(...)
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
        string $propertyToken,
        Type|string $type = 'FETCHED_OBJECT_PROPERTY'
    ): self {
        $obj = new self;

        $obj->propertyToken = $propertyToken;
        $obj['type'] = $type;

        return $obj;
    }

    public function withPropertyToken(string $propertyToken): self
    {
        $obj = clone $this;
        $obj->propertyToken = $propertyToken;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
