<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_static_value = array{
 *   staticValue: string, type: value-of<Type>
 * }
 */
final class APIStaticValue implements BaseModel
{
    /** @use SdkModel<api_static_value> */
    use SdkModel;

    #[Api]
    public string $staticValue;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIStaticValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticValue::with(staticValue: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIStaticValue)->withStaticValue(...)->withType(...)
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
        string $staticValue,
        Type|string $type = 'STATIC_VALUE'
    ): self {
        $obj = new self;

        $obj->staticValue = $staticValue;
        $obj['type'] = $type;

        return $obj;
    }

    public function withStaticValue(string $staticValue): self
    {
        $obj = clone $this;
        $obj->staticValue = $staticValue;

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
