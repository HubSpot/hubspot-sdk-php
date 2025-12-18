<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule\Month;
use HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APITimeOfDayShape from \HubspotSDK\Automation\Workflows\APITimeOfDay
 *
 * @phpstan-type APIYearlyEnrollmentScheduleShape = array{
 *   dayOfMonth: int,
 *   month: Month|value-of<Month>,
 *   timeOfDay: APITimeOfDay|APITimeOfDayShape,
 *   type: Type|value-of<Type>,
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
     * @param APITimeOfDay|APITimeOfDayShape $timeOfDay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $dayOfMonth,
        Month|string $month,
        APITimeOfDay|array $timeOfDay,
        Type|string $type = 'YEARLY',
    ): self {
        $self = new self;

        $self['dayOfMonth'] = $dayOfMonth;
        $self['month'] = $month;
        $self['timeOfDay'] = $timeOfDay;
        $self['type'] = $type;

        return $self;
    }

    public function withDayOfMonth(int $dayOfMonth): self
    {
        $self = clone $this;
        $self['dayOfMonth'] = $dayOfMonth;

        return $self;
    }

    /**
     * @param Month|value-of<Month> $month
     */
    public function withMonth(Month|string $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    /**
     * @param APITimeOfDay|APITimeOfDayShape $timeOfDay
     */
    public function withTimeOfDay(APITimeOfDay|array $timeOfDay): self
    {
        $self = clone $this;
        $self['timeOfDay'] = $timeOfDay;

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
