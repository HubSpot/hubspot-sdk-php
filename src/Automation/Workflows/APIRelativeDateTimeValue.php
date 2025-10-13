<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIRelativeDateTimeValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_relative_date_time_value = array{
 *   timeDelay: APITimeDelay, type: value-of<Type>
 * }
 */
final class APIRelativeDateTimeValue implements BaseModel
{
    /** @use SdkModel<api_relative_date_time_value> */
    use SdkModel;

    #[Api]
    public APITimeDelay $timeDelay;

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIRelativeDateTimeValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIRelativeDateTimeValue::with(timeDelay: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIRelativeDateTimeValue)->withTimeDelay(...)->withType(...)
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
        APITimeDelay $timeDelay,
        Type|string $type = 'RELATIVE_DATETIME'
    ): self {
        $obj = new self;

        $obj->timeDelay = $timeDelay;
        $obj['type'] = $type;

        return $obj;
    }

    public function withTimeDelay(APITimeDelay $timeDelay): self
    {
        $obj = clone $this;
        $obj->timeDelay = $timeDelay;

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
