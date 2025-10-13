<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APITimestampValue\TimestampType;
use HubspotSDK\Automation\Workflows\APITimestampValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_timestamp_value = array{
 *   timestampType: value-of<TimestampType>, type: value-of<Type>
 * }
 */
final class APITimestampValue implements BaseModel
{
    /** @use SdkModel<api_timestamp_value> */
    use SdkModel;

    /**
     * Currently only EXECUTION_TIME is supported.
     *
     * @var value-of<TimestampType> $timestampType
     */
    #[Api(enum: TimestampType::class)]
    public string $timestampType;

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APITimestampValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APITimestampValue::with(timestampType: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APITimestampValue)->withTimestampType(...)->withType(...)
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

        $obj['timestampType'] = $timestampType;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Currently only EXECUTION_TIME is supported.
     *
     * @param TimestampType|value-of<TimestampType> $timestampType
     */
    public function withTimestampType(TimestampType|string $timestampType): self
    {
        $obj = clone $this;
        $obj['timestampType'] = $timestampType;

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
