<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIMonthlySpecificDaysEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIMonthlySpecificDaysEnrollmentScheduleShape = array{
 *   daysOfMonth: list<int>, timeOfDay: APITimeOfDay, type: value-of<Type>
 * }
 */
final class APIMonthlySpecificDaysEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<APIMonthlySpecificDaysEnrollmentScheduleShape> */
    use SdkModel;

    /** @var list<int> $daysOfMonth */
    #[Required(list: 'int')]
    public array $daysOfMonth;

    #[Required]
    public APITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIMonthlySpecificDaysEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIMonthlySpecificDaysEnrollmentSchedule::with(
     *   daysOfMonth: ..., timeOfDay: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIMonthlySpecificDaysEnrollmentSchedule)
     *   ->withDaysOfMonth(...)
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
     * @param list<int> $daysOfMonth
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $daysOfMonth,
        APITimeOfDay|array $timeOfDay,
        Type|string $type = 'MONTHLY_SPECIFIC_DAYS',
    ): self {
        $self = new self;

        $self['daysOfMonth'] = $daysOfMonth;
        $self['timeOfDay'] = $timeOfDay;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<int> $daysOfMonth
     */
    public function withDaysOfMonth(array $daysOfMonth): self
    {
        $self = clone $this;
        $self['daysOfMonth'] = $daysOfMonth;

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
