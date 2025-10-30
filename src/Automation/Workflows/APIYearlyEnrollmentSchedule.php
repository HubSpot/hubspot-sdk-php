<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule\Month;
use HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Api;
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

    /**
     * The day of the date each year to run this flow.
     */
    #[Api]
    public int $dayOfMonth;

    /**
     * The month of the date each year to run this flow.
     *
     * @var value-of<Month> $month
     */
    #[Api(enum: Month::class)]
    public string $month;

    #[Api]
    public APITimeOfDay $timeOfDay;

    /**
     * The type of enrollment schedule this is, can be: "DAILY", "WEEKLY", "MONTHLY_SPECIFIC_DAYS", "MONTHLY_RELATIVE_DAYS", "YEARLY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $dayOfMonth,
        Month|string $month,
        APITimeOfDay $timeOfDay,
        Type|string $type = 'YEARLY',
    ): self {
        $obj = new self;

        $obj->dayOfMonth = $dayOfMonth;
        $obj['month'] = $month;
        $obj->timeOfDay = $timeOfDay;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The day of the date each year to run this flow.
     */
    public function withDayOfMonth(int $dayOfMonth): self
    {
        $obj = clone $this;
        $obj->dayOfMonth = $dayOfMonth;

        return $obj;
    }

    /**
     * The month of the date each year to run this flow.
     *
     * @param Month|value-of<Month> $month
     */
    public function withMonth(Month|string $month): self
    {
        $obj = clone $this;
        $obj['month'] = $month;

        return $obj;
    }

    public function withTimeOfDay(APITimeOfDay $timeOfDay): self
    {
        $obj = clone $this;
        $obj->timeOfDay = $timeOfDay;

        return $obj;
    }

    /**
     * The type of enrollment schedule this is, can be: "DAILY", "WEEKLY", "MONTHLY_SPECIFIC_DAYS", "MONTHLY_RELATIVE_DAYS", "YEARLY".
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
