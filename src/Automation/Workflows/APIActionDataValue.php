<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIActionDataValue\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIActionDataValueShape = array{
 *   actionID: string, dataKey: string, type: Type|value-of<Type>
 * }
 */
final class APIActionDataValue implements BaseModel
{
    /** @use SdkModel<APIActionDataValueShape> */
    use SdkModel;

    #[Required('actionId')]
    public string $actionID;

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
        $self = new self;

        $self['actionID'] = $actionID;
        $self['dataKey'] = $dataKey;
        $self['type'] = $type;

        return $self;
    }

    public function withActionID(string $actionID): self
    {
        $self = clone $this;
        $self['actionID'] = $actionID;

        return $self;
    }

    public function withDataKey(string $dataKey): self
    {
        $self = clone $this;
        $self['dataKey'] = $dataKey;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
