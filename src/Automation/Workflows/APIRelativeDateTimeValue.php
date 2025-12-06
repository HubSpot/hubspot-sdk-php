<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIRelativeDateTimeValue\Type;
use HubspotSDK\Automation\Workflows\APITimeDelay\DaysOfWeek;
use HubspotSDK\Automation\Workflows\APITimeDelay\TimeUnit;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIRelativeDateTimeValueShape = array{
 *   timeDelay: APITimeDelay, type: value-of<Type>
 * }
 */
final class APIRelativeDateTimeValue implements BaseModel
{
    /** @use SdkModel<APIRelativeDateTimeValueShape> */
    use SdkModel;

    #[Api]
    public APITimeDelay $timeDelay;

    /** @var value-of<Type> $type */
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
     * @param APITimeDelay|array{
     *   daysOfWeek: list<value-of<DaysOfWeek>>,
     *   delta: int,
     *   timeUnit: value-of<TimeUnit>,
     *   timeOfDay?: APITimeOfDay|null,
     *   timeZoneStrategy?: APIStaticTimeZoneStrategy|null,
     * } $timeDelay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        APITimeDelay|array $timeDelay,
        Type|string $type = 'RELATIVE_DATETIME'
    ): self {
        $obj = new self;

        $obj['timeDelay'] = $timeDelay;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param APITimeDelay|array{
     *   daysOfWeek: list<value-of<DaysOfWeek>>,
     *   delta: int,
     *   timeUnit: value-of<TimeUnit>,
     *   timeOfDay?: APITimeOfDay|null,
     *   timeZoneStrategy?: APIStaticTimeZoneStrategy|null,
     * } $timeDelay
     */
    public function withTimeDelay(APITimeDelay|array $timeDelay): self
    {
        $obj = clone $this;
        $obj['timeDelay'] = $timeDelay;

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
