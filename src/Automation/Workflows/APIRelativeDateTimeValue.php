<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIRelativeDateTimeValue\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APITimeDelayShape from \HubspotSDK\Automation\Workflows\APITimeDelay
 *
 * @phpstan-type APIRelativeDateTimeValueShape = array{
 *   timeDelay: APITimeDelay|APITimeDelayShape, type: Type|value-of<Type>
 * }
 */
final class APIRelativeDateTimeValue implements BaseModel
{
    /** @use SdkModel<APIRelativeDateTimeValueShape> */
    use SdkModel;

    #[Required]
    public APITimeDelay $timeDelay;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
     * @param APITimeDelayShape $timeDelay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        APITimeDelay|array $timeDelay,
        Type|string $type = 'RELATIVE_DATETIME'
    ): self {
        $self = new self;

        $self['timeDelay'] = $timeDelay;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param APITimeDelayShape $timeDelay
     */
    public function withTimeDelay(APITimeDelay|array $timeDelay): self
    {
        $self = clone $this;
        $self['timeDelay'] = $timeDelay;

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
