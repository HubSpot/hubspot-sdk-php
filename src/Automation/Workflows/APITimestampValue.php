<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APITimestampValue\TimestampType;
use HubspotSDK\Automation\Workflows\APITimestampValue\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APITimestampValueShape = array{
 *   timestampType: TimestampType|value-of<TimestampType>,
 *   type: Type|value-of<Type>,
 * }
 */
final class APITimestampValue implements BaseModel
{
    /** @use SdkModel<APITimestampValueShape> */
    use SdkModel;

    /** @var value-of<TimestampType> $timestampType */
    #[Required(enum: TimestampType::class)]
    public string $timestampType;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
        $self = new self;

        $self['timestampType'] = $timestampType;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param TimestampType|value-of<TimestampType> $timestampType
     */
    public function withTimestampType(TimestampType|string $timestampType): self
    {
        $self = clone $this;
        $self['timestampType'] = $timestampType;

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
