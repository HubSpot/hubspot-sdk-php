<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIStaticAppendValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_static_append_value = array{
 *   staticAppendValue: string, type: value-of<Type>
 * }
 */
final class AutomationAPIStaticAppendValue implements BaseModel
{
    /** @use SdkModel<automation_api_static_append_value> */
    use SdkModel;

    #[Api]
    public string $staticAppendValue;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIStaticAppendValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIStaticAppendValue::with(staticAppendValue: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIStaticAppendValue)->withStaticAppendValue(...)->withType(...)
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
        string $staticAppendValue,
        Type|string $type = 'STATIC_APPEND_VALUE'
    ): self {
        $obj = new self;

        $obj->staticAppendValue = $staticAppendValue;
        $obj['type'] = $type;

        return $obj;
    }

    public function withStaticAppendValue(string $staticAppendValue): self
    {
        $obj = clone $this;
        $obj->staticAppendValue = $staticAppendValue;

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
