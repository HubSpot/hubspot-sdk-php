<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIActionDataValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIActionDataValueShape = array{
 *   actionID: string, dataKey: string, type: value-of<Type>
 * }
 */
final class APIActionDataValue implements BaseModel
{
    /** @use SdkModel<APIActionDataValueShape> */
    use SdkModel;

    /**
     * Which action to pull data from.
     */
    #[Api('actionId')]
    public string $actionID;

    /**
     * The output field name for that action.
     */
    #[Api]
    public string $dataKey;

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIActionDataValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIActionDataValue::with(actionID: ..., dataKey: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIActionDataValue)->withActionID(...)->withDataKey(...)->withType(...)
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
        string $actionID,
        string $dataKey,
        Type|string $type = 'FIELD_DATA'
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj->dataKey = $dataKey;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Which action to pull data from.
     */
    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj->actionID = $actionID;

        return $obj;
    }

    /**
     * The output field name for that action.
     */
    public function withDataKey(string $dataKey): self
    {
        $obj = clone $this;
        $obj->dataKey = $dataKey;

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
