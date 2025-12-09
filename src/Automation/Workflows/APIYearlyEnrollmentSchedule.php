<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule\Month;
use HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIYearlyEnrollmentScheduleShape = array{
 *   dayOfMonth: int,
 *   month: value-of<Month>,
 *   timeOfDay: APITimeOfDay,
 *   type: value-of<Type>,
 * }
 */
final class APIYearlyEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<APIYearlyEnrollmentScheduleShape> */
    use SdkModel;

    #[Required]
    public int $dayOfMonth;

    /** @var value-of<Month> $month */
    #[Required(enum: Month::class)]
    public string $month;

    #[Required]
    public APITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIYearlyEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIYearlyEnrollmentSchedule::with(
     *   dayOfMonth: ..., month: ..., timeOfDay: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIYearlyEnrollmentSchedule)
     *   ->withDayOfMonth(...)
     *   ->withMonth(...)
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
     * @param Month|value-of<Month> $month
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $dayOfMonth,
        Month|string $month,
        APITimeOfDay|array $timeOfDay,
        Type|string $type = 'YEARLY',
    ): self {
        $obj = new self;

        $obj['dayOfMonth'] = $dayOfMonth;
        $obj['month'] = $month;
        $obj['timeOfDay'] = $timeOfDay;
        $obj['type'] = $type;

        return $obj;
    }

    public function withDayOfMonth(int $dayOfMonth): self
    {
        $obj = clone $this;
        $obj['dayOfMonth'] = $dayOfMonth;

        return $obj;
    }

    /**
     * @param Month|value-of<Month> $month
     */
    public function withMonth(Month|string $month): self
    {
        $obj = clone $this;
        $obj['month'] = $month;

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
