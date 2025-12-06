<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIWeeklyEnrollmentSchedule\DaysOfWeek;
use HubspotSDK\Automation\Workflows\APIWeeklyEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIWeeklyEnrollmentScheduleShape = array{
 *   daysOfWeek: list<value-of<DaysOfWeek>>,
 *   timeOfDay: APITimeOfDay,
 *   type: value-of<Type>,
 * }
 */
final class APIWeeklyEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<APIWeeklyEnrollmentScheduleShape> */
    use SdkModel;

    /** @var list<value-of<DaysOfWeek>> $daysOfWeek */
    #[Api(list: DaysOfWeek::class)]
    public array $daysOfWeek;

    #[Api]
    public APITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIWeeklyEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIWeeklyEnrollmentSchedule::with(daysOfWeek: ..., timeOfDay: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIWeeklyEnrollmentSchedule)
     *   ->withDaysOfWeek(...)
     *   ->withTimeOfDay(...)
     *   ->withType(...)
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
     * @param list<DaysOfWeek|value-of<DaysOfWeek>> $daysOfWeek
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $daysOfWeek,
        APITimeOfDay|array $timeOfDay,
        Type|string $type = 'WEEKLY',
    ): self {
        $obj = new self;

        $obj['daysOfWeek'] = $daysOfWeek;
        $obj['timeOfDay'] = $timeOfDay;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param list<DaysOfWeek|value-of<DaysOfWeek>> $daysOfWeek
     */
    public function withDaysOfWeek(array $daysOfWeek): self
    {
        $obj = clone $this;
        $obj['daysOfWeek'] = $daysOfWeek;

        return $obj;
    }

    /**
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
     */
    public function withTimeOfDay(APITimeOfDay|array $timeOfDay): self
    {
        $obj = clone $this;
        $obj['timeOfDay'] = $timeOfDay;

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
