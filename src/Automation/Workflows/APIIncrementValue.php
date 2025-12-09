<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIIncrementValue\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIIncrementValueShape = array{
 *   incrementAmount: float, type: value-of<Type>
 * }
 */
final class APIIncrementValue implements BaseModel
{
    /** @use SdkModel<APIIncrementValueShape> */
    use SdkModel;

    #[Required]
    public float $incrementAmount;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIIncrementValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIIncrementValue::with(incrementAmount: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIIncrementValue)->withIncrementAmount(...)->withType(...)
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
        float $incrementAmount,
        Type|string $type = 'INCREMENT'
    ): self {
        $obj = new self;

        $obj['incrementAmount'] = $incrementAmount;
        $obj['type'] = $type;

        return $obj;
    }

    public function withIncrementAmount(float $incrementAmount): self
    {
        $obj = clone $this;
        $obj['incrementAmount'] = $incrementAmount;

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
