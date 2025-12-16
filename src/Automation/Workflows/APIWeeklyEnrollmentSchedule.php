<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIWeeklyEnrollmentSchedule\DaysOfWeek;
use HubspotSDK\Automation\Workflows\APIWeeklyEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APITimeOfDayShape from \HubspotSDK\Automation\Workflows\APITimeOfDay
 *
 * @phpstan-type APIWeeklyEnrollmentScheduleShape = array{
 *   daysOfWeek: list<DaysOfWeek|value-of<DaysOfWeek>>,
 *   timeOfDay: APITimeOfDay|APITimeOfDayShape,
 *   type: Type|value-of<Type>,
 * }
 */
final class APIWeeklyEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<APIWeeklyEnrollmentScheduleShape> */
    use SdkModel;

    /** @var list<value-of<DaysOfWeek>> $daysOfWeek */
    #[Required(list: DaysOfWeek::class)]
    public array $daysOfWeek;

    #[Required]
    public APITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
     * @param APITimeOfDayShape $timeOfDay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $daysOfWeek,
        APITimeOfDay|array $timeOfDay,
        Type|string $type = 'WEEKLY',
    ): self {
        $self = new self;

        $self['daysOfWeek'] = $daysOfWeek;
        $self['timeOfDay'] = $timeOfDay;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<DaysOfWeek|value-of<DaysOfWeek>> $daysOfWeek
     */
    public function withDaysOfWeek(array $daysOfWeek): self
    {
        $self = clone $this;
        $self['daysOfWeek'] = $daysOfWeek;

        return $self;
    }

    /**
     * @param APITimeOfDayShape $timeOfDay
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
