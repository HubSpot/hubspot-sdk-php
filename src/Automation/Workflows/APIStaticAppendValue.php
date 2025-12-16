<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticAppendValue\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIStaticAppendValueShape = array{
 *   staticAppendValue: string, type: Type|value-of<Type>
 * }
 */
final class APIStaticAppendValue implements BaseModel
{
    /** @use SdkModel<APIStaticAppendValueShape> */
    use SdkModel;

    #[Required]
    public string $staticAppendValue;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIStaticAppendValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticAppendValue::with(staticAppendValue: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIStaticAppendValue)->withStaticAppendValue(...)->withType(...)
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
        $self = new self;

        $self['staticAppendValue'] = $staticAppendValue;
        $self['type'] = $type;

        return $self;
    }

    public function withStaticAppendValue(string $staticAppendValue): self
    {
        $self = clone $this;
        $self['staticAppendValue'] = $staticAppendValue;

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
