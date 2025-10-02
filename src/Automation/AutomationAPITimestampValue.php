<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPITimestampValue\TimestampType;
use HubspotSDK\Automation\AutomationAPITimestampValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_timestamp_value = array{
 *   timestampType: value-of<TimestampType>, type: value-of<Type>
 * }
 */
final class AutomationAPITimestampValue implements BaseModel
{
    /** @use SdkModel<automation_api_timestamp_value> */
    use SdkModel;

    /** @var value-of<TimestampType> $timestampType */
    #[Api(enum: TimestampType::class)]
    public string $timestampType;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPITimestampValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPITimestampValue::with(timestampType: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPITimestampValue)->withTimestampType(...)->withType(...)
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
     * @param TimestampType|value-of<TimestampType> $timestampType
     * @param Type|value-of<Type> $type
     */
    public static function with(
        TimestampType|string $timestampType,
        Type|string $type = 'TIMESTAMP'
    ): self {
        $obj = new self;

        $obj->timestampType = $timestampType instanceof TimestampType ? $timestampType->value : $timestampType;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * @param TimestampType|value-of<TimestampType> $timestampType
     */
    public function withTimestampType(TimestampType|string $timestampType): self
    {
        $obj = clone $this;
        $obj->timestampType = $timestampType instanceof TimestampType ? $timestampType->value : $timestampType;

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
