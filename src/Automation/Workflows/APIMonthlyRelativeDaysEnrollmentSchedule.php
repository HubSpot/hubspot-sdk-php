<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIMonthlyRelativeDaysEnrollmentSchedule\MonthlyRelativeDays;
use HubspotSDK\Automation\Workflows\APIMonthlyRelativeDaysEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIMonthlyRelativeDaysEnrollmentScheduleShape = array{
 *   monthlyRelativeDays: value-of<MonthlyRelativeDays>,
 *   timeOfDay: APITimeOfDay,
 *   type: value-of<Type>,
 * }
 */
final class APIMonthlyRelativeDaysEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<APIMonthlyRelativeDaysEnrollmentScheduleShape> */
    use SdkModel;

    /** @var value-of<MonthlyRelativeDays> $monthlyRelativeDays */
    #[Required(enum: MonthlyRelativeDays::class)]
    public string $monthlyRelativeDays;

    #[Required]
    public APITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIMonthlyRelativeDaysEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIMonthlyRelativeDaysEnrollmentSchedule::with(
     *   monthlyRelativeDays: ..., timeOfDay: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIMonthlyRelativeDaysEnrollmentSchedule)
     *   ->withMonthlyRelativeDays(...)
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
     * @param MonthlyRelativeDays|value-of<MonthlyRelativeDays> $monthlyRelativeDays
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        MonthlyRelativeDays|string $monthlyRelativeDays,
        APITimeOfDay|array $timeOfDay,
        Type|string $type = 'MONTHLY_RELATIVE_DAYS',
    ): self {
        $self = new self;

        $self['monthlyRelativeDays'] = $monthlyRelativeDays;
        $self['timeOfDay'] = $timeOfDay;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param MonthlyRelativeDays|value-of<MonthlyRelativeDays> $monthlyRelativeDays
     */
    public function withMonthlyRelativeDays(
        MonthlyRelativeDays|string $monthlyRelativeDays
    ): self {
        $self = clone $this;
        $self['monthlyRelativeDays'] = $monthlyRelativeDays;

        return $self;
    }

    /**
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
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
