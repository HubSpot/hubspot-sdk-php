<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIActionDataValue\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIActionDataValueShape = array{
 *   actionId: string, dataKey: string, type: value-of<Type>
 * }
 */
final class APIActionDataValue implements BaseModel
{
    /** @use SdkModel<APIActionDataValueShape> */
    use SdkModel;

    #[Required]
    public string $actionId;

    #[Required]
    public string $dataKey;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIActionDataValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIActionDataValue::with(actionId: ..., dataKey: ..., type: ...)
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
        string $actionId,
        string $dataKey,
        Type|string $type = 'FIELD_DATA'
    ): self {
        $obj = new self;

        $obj['actionId'] = $actionId;
        $obj['dataKey'] = $dataKey;
        $obj['type'] = $type;

        return $obj;
    }

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj['actionId'] = $actionID;

        return $obj;
    }

    public function withDataKey(string $dataKey): self
    {
        $obj = clone $this;
        $obj['dataKey'] = $dataKey;

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
